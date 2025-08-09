<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer des catégories de test
        $categories = [
            ['name' => 'Électronique', 'slug' => 'electronique', 'description' => 'Produits électroniques'],
            ['name' => 'Vêtements', 'slug' => 'vetements', 'description' => 'Vêtements et accessoires'],
            ['name' => 'Maison & Jardin', 'slug' => 'maison-jardin', 'description' => 'Articles pour la maison'],
            ['name' => 'Sports & Loisirs', 'slug' => 'sports-loisirs', 'description' => 'Articles de sport'],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(['slug' => $categoryData['slug']], $categoryData);
        }

        // Créer des utilisateurs clients de test
        for ($i = 1; $i <= 10; $i++) {
            User::firstOrCreate(
                ['email' => "client{$i}@example.com"],
                [
                    'name' => "Client {$i}",
                    'password' => Hash::make('password'),
                    'role' => 'client',
                    'email_verified_at' => now(),
                ]
            );
        }

        // Créer des utilisateurs vendeurs de test
        for ($i = 1; $i <= 3; $i++) {
            User::firstOrCreate(
                ['email' => "vendeur{$i}@example.com"],
                [
                    'name' => "Vendeur {$i}",
                    'password' => Hash::make('password'),
                    'role' => 'vendor',
                    'email_verified_at' => now(),
                ]
            );
        }

        // Créer des produits de test
        $categories = Category::all();
        $vendors = User::where('role', 'vendor')->get();

        if ($categories->isNotEmpty() && $vendors->isNotEmpty()) {
            $products = [
                ['name' => 'iPhone 15 Pro', 'price' => 1199.99, 'description' => 'Dernier iPhone Apple'],
                ['name' => 'Samsung Galaxy S24', 'price' => 999.99, 'description' => 'Smartphone Samsung haut de gamme'],
                ['name' => 'MacBook Air M2', 'price' => 1499.99, 'description' => 'Ordinateur portable Apple'],
                ['name' => 'T-shirt Premium', 'price' => 29.99, 'description' => 'T-shirt en coton bio'],
                ['name' => 'Jean Slim', 'price' => 79.99, 'description' => 'Jean coupe slim'],
                ['name' => 'Chaise de Bureau', 'price' => 199.99, 'description' => 'Chaise ergonomique'],
                ['name' => 'Lampe LED', 'price' => 49.99, 'description' => 'Lampe de bureau LED'],
                ['name' => 'Raquette de Tennis', 'price' => 149.99, 'description' => 'Raquette professionnelle'],
                ['name' => 'Ballon de Football', 'price' => 24.99, 'description' => 'Ballon officiel'],
                ['name' => 'Casque Audio', 'price' => 299.99, 'description' => 'Casque sans fil premium'],
            ];

            foreach ($products as $productData) {
                Product::firstOrCreate(
                    ['name' => $productData['name']],
                    [
                        'slug' => Str::slug($productData['name']),
                        'description' => $productData['description'],
                        'price' => $productData['price'],
                        'stock' => rand(10, 100),
                        'category_id' => $categories->random()->id,
                        'user_id' => $vendors->random()->id,
                        'is_active' => true,
                        'is_featured' => rand(0, 1),
                        'sku' => 'SKU-' . strtoupper(uniqid()),
                    ]
                );
            }
        }

        $this->command->info('Données de test créées avec succès !');
        $this->command->info('- ' . Category::count() . ' catégories');
        $this->command->info('- ' . User::where('role', 'client')->count() . ' clients');
        $this->command->info('- ' . User::where('role', 'vendor')->count() . ' vendeurs');
        $this->command->info('- ' . Product::count() . ' produits');
    }
}
