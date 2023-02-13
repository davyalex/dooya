<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use App\Models\SousCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SousCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create('fr_FR');
        $category = Category::pluck('id')->toArray();


        for ($i = 0; $i < 50; $i++) {
          $sous_category = new SousCategory();
          $sous_category->title = $faker->text(20);
          $sous_category->code = $faker->randomNumber(5);
          $sous_category->category_id = $faker->randomElement($category);
          $sous_category->save();
    }
    }
}
