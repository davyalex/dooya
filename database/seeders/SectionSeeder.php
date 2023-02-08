<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
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
        // $section = section::pluck('id')->toArray();
        // $user = User::pluck('id')->toArray();


        for ($i = 0; $i < 10; $i++) {
          $section = new Section();
          $section->title = $faker->text(20);
          $section->save();
    }
    }
}
