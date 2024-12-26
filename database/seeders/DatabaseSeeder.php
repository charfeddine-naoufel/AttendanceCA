<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
        ]);
        // matiere seeder
        \App\Models\Matiere::create([
            'nom_mat_fr' => 'Pack:Ang-Arab-Fr-Math-Sc',
            'nom_mat_ar' =>'كل المواد',
        ]);
        \App\Models\Matiere::create([
            'nom_mat_fr' => 'Arabe',
            'nom_mat_ar' =>'العربية',
        ]);
        \App\Models\Matiere::create([
            'nom_mat_fr' => 'Français',
            'nom_mat_ar' =>'الفرنسية',
        ]);
        \App\Models\Matiere::create([
            'nom_mat_fr' => 'Gestion',
            'nom_mat_ar' =>'تصرف',
        ]);
        \App\Models\Matiere::create([
            'nom_mat_fr' => 'Economie',
            'nom_mat_ar' =>'اقتصاد',
        ]);
        \App\Models\Matiere::create([
            'nom_mat_fr' => 'Informatique',
            'nom_mat_ar' =>'الاعلامية',
        ]);
        // Niveau seeder
        \App\Models\Niveau::create([
            'nom_niv_fr' => '7ème ',
            'nom_niv_ar' =>'السابعة اساسي',
        ]);
        \App\Models\Niveau::create([
            'nom_niv_fr' => '8ème ',
            'nom_niv_ar' =>'الثامنة اساسي',
        ]);
        \App\Models\Niveau::create([
            'nom_niv_fr' => '9ème ',
            'nom_niv_ar' =>'التاسعة اساسي',
        ]);
        \App\Models\Niveau::create([
            'nom_niv_fr' => '4ème Eco&gestion ',
            'nom_niv_ar' =>'الرابعة اقتصاد',
        ]);
        \App\Models\Niveau::create([
            'nom_niv_fr' => '3ème Eco&gestion ',
            'nom_niv_ar' =>'الثالثة اقتصاد',
        ]);
        \App\Models\Niveau::create([
            'nom_niv_fr' => '2ème Eco&gestion ',
            'nom_niv_ar' =>'الثانية اقتصاد',
        ]);
    }
}
