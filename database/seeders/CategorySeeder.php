<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Électronique',
                'description' => 'Tous les produits électroniques et technologiques',
                'slug' => 'electronique',
                'image' => 'images/categories/electronique.jpeg',
            ],
            [
                'name' => 'Mode & Accessoires',
                'description' => 'Vêtements, chaussures et accessoires de mode',
                'slug' => 'mode-accessoires',
                'image' => 'images/categories/mode-accessoires.jpeg',
            ],
            [
                'name' => 'Maison & Jardin',
                'description' => 'Décoration, mobilier et articles pour la maison',
                'slug' => 'maison-jardin',
                'image' => 'images/categories/maison-jardin.jpeg',
            ],
            [
                'name' => 'Sport & Loisirs',
                'description' => 'Équipements sportifs et articles de loisirs',
                'slug' => 'sport-loisirs',
                'image' => 'images/categories/sport-loisirs.jpeg',
            ],
            [
                'name' => 'Livres & Médias',
                'description' => 'Livres, films, musique et jeux vidéo',
                'slug' => 'livres-medias',
                'image' => 'images/categories/livres-medias.jpeg',
            ],
            [
                'name' => 'Beauté & Santé',
                'description' => 'Cosmétiques, parfums et produits de santé',
                'slug' => 'beaute-sante',
                'image' => 'images/categories/beaute-sante.jpeg',
            ],
            [
                'name' => 'Automobile',
                'description' => 'Pièces auto, accessoires et équipements',
                'slug' => 'automobile',
                'image' => 'images/categories/automobile.png',
            ],
            [
                'name' => 'Bébé & Enfant',
                'description' => 'Articles pour bébés et enfants',
                'slug' => 'bebe-enfant',
                'image' => 'images/categories/bebe-enfant.jpeg',
            ],
            [
                'name' => 'Alimentation',
                'description' => 'Produits alimentaires et boissons',
                'slug' => 'alimentation',
                'image' => 'images/categories/alimentation.jpg',
            ],
            [
                'name' => 'Bricolage & Outils',
                'description' => 'Outils, matériaux et équipements de bricolage',
                'slug' => 'bricolage-outils',
                'image' => 'images/categories/bricolage-outils.jpg',
            ],
            [
                'name' => 'Informatique',
                'description' => 'Ordinateurs, composants et accessoires informatiques',
                'slug' => 'informatique',
                'image' => 'images/categories/informatique.jpg',
            ],
            [
                'name' => 'Téléphonie',
                'description' => 'Smartphones, tablettes et accessoires',
                'slug' => 'telephonie',
                'image' => 'images/categories/telephonie.jpeg',
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }
    }
}
