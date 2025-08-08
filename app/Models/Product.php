<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'stock',
        'sku',
        'barcode',
        'brand',
        'model',
        'images',
        'specifications',
        'is_featured',
        'is_active',
        'is_virtual',
        'weight',
        'length',
        'width',
        'height',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'images' => 'array',
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_virtual' => 'boolean',
        'weight' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->compare_price && $this->compare_price > $this->price) {
            return round((($this->compare_price - $this->price) / $this->compare_price) * 100);
        }
        return 0;
    }

    public function getMainImageAttribute()
    {
        // Si des images sont définies, retourner la première
        if ($this->images && is_array($this->images) && count($this->images) > 0) {
            return $this->images[0];
        }

        // Sinon, essayer de générer le nom de l'image basé sur le nom du produit
        return $this->generateImageFromName();
    }

    /**
     * Génère le nom de l'image basé sur le nom du produit
     */
    public function generateImageFromName()
    {
        if (!$this->name) return null;

        // Convertir le nom en slug pour le nom de fichier
        $imageName = Str::slug($this->name, '-');

        // Extensions possibles
        $extensions = ['png', 'jpg', 'jpeg', 'webp'];

        foreach ($extensions as $ext) {
            $imagePath = "images/products/{$imageName}.{$ext}";
            if (file_exists(public_path($imagePath))) {
                return $imagePath;
            }
        }

        return null;
    }

    /**
     * Retourne l'URL complète de l'image principale
     */
    public function getMainImageUrlAttribute()
    {
        $slug = Str::slug($this->name, '-');
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'svg'];

        // 1. Check in storage/app/public/products/
        foreach ($extensions as $ext) {
            $storagePath = "products/{$slug}.{$ext}";
            if (Storage::disk('public')->exists($storagePath)) {
                return asset('storage/' . $storagePath);
            }
        }

        // 2. Fallback to public/images/products/
        foreach ($extensions as $ext) {
            $publicPath = public_path("images/products/{$slug}.{$ext}");
            if (file_exists($publicPath)) {
                return asset("images/products/{$slug}.{$ext}");
            }
        }

        // 3. Fallback to placeholder
        return $this->getPlaceholderImage();
    }

    /**
     * Retourne une image placeholder basée sur la catégorie
     */
    public function getPlaceholderImage()
    {
        $categoryPlaceholders = [
            'electronique' => 'https://via.placeholder.com/400x300/6366f1/ffffff?text=📱+Électronique',
            'mode-beaute' => 'https://via.placeholder.com/400x300/ec4899/ffffff?text=💄+Mode+%26+Beauté',
            'maison-jardin' => 'https://via.placeholder.com/400x300/10b981/ffffff?text=🏠+Maison+%26+Jardin',
            'sport-loisirs' => 'https://via.placeholder.com/400x300/f59e0b/ffffff?text=⚡+Sport+%26+Loisirs',
            'auto-moto' => 'https://via.placeholder.com/400x300/ef4444/ffffff?text=🚗+Auto+%26+Moto',
            'livres-culture' => 'https://via.placeholder.com/400x300/8b5cf6/ffffff?text=📚+Livres+%26+Culture',
            'sante-bien-etre' => 'https://via.placeholder.com/400x300/06b6d4/ffffff?text=💚+Santé+%26+Bien-être',
            'enfants-bebes' => 'https://via.placeholder.com/400x300/f97316/ffffff?text=😊+Enfants+%26+Bébés',
            'alimentation' => 'https://via.placeholder.com/400x300/84cc16/ffffff?text=🍽️+Alimentation',
        ];

        $categorySlug = $this->category ? $this->category->slug : 'default';

        return $categoryPlaceholders[$categorySlug] ?? 'https://via.placeholder.com/400x300/6b7280/ffffff?text=📦+Produit';
    }

    public function isInStock()
    {
        return $this->stock > 0;
    }

    public function hasDiscount()
    {
        return $this->compare_price && $this->compare_price > $this->price;
    }

    /**
     * Vérifie si le produit est en rupture de stock
     */
    public function isOutOfStock()
    {
        return $this->stock <= 0;
    }
}
