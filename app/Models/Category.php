<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Retourne l'URL complète de l'image de la catégorie
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Vérifier si l'image existe dans le chemin spécifié
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
        }

        // Fallback vers une image placeholder basée sur le slug
        return $this->getPlaceholderImage();
    }

    /**
     * Retourne une image placeholder basée sur la catégorie
     */
    public function getPlaceholderImage()
    {
        $categoryPlaceholders = [
            'electronique' => 'https://via.placeholder.com/400x300/6366f1/ffffff?text=📱+Électronique',
            'mode-accessoires' => 'https://via.placeholder.com/400x300/ec4899/ffffff?text=👗+Mode+%26+Accessoires',
            'maison-jardin' => 'https://via.placeholder.com/400x300/10b981/ffffff?text=🏠+Maison+%26+Jardin',
            'sport-loisirs' => 'https://via.placeholder.com/400x300/f59e0b/ffffff?text=⚽+Sport+%26+Loisirs',
            'livres-medias' => 'https://via.placeholder.com/400x300/8b5cf6/ffffff?text=📚+Livres+%26+Médias',
            'beaute-sante' => 'https://via.placeholder.com/400x300/06b6d4/ffffff?text=💄+Beauté+%26+Santé',
            'automobile' => 'https://via.placeholder.com/400x300/ef4444/ffffff?text=🚗+Automobile',
            'bebe-enfant' => 'https://via.placeholder.com/400x300/f97316/ffffff?text=👶+Bébé+%26+Enfant',
            'alimentation' => 'https://via.placeholder.com/400x300/84cc16/ffffff?text=🍽️+Alimentation',
            'bricolage-outils' => 'https://via.placeholder.com/400x300/6b7280/ffffff?text=🔨+Bricolage+%26+Outils',
            'informatique' => 'https://via.placeholder.com/400x300/3b82f6/ffffff?text=💻+Informatique',
            'telephonie' => 'https://via.placeholder.com/400x300/8b5cf6/ffffff?text=📱+Téléphonie',
        ];

        return $categoryPlaceholders[$this->slug] ?? 'https://via.placeholder.com/400x300/6b7280/ffffff?text=📦+Catégorie';
    }
}
