<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
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
        // $category = Category::pluck('id')->toArray();
        // $user = User::pluck('id')->toArray();


        for ($i = 0; $i < 10; $i++) {
          $category = new Category();
          $category->title = $faker->text(20);
          $category->save();
    }
    }
}
