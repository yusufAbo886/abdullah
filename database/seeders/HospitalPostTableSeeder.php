<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HospitalPost;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class HospitalPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=0; $i<50; $i++)  {
            HospitalPost::create([
                'theTitleEn' => $faker->name,
                'theTitleTr' => $faker->sentence(4),
                'theLocation' =>  "fewfegre",
                'thePhone' => "322324",
                'theEmail' =>  $faker->unique()->safeEmail,
                'theWebsite' => $faker->sentence(4),
                'facebook' => $faker->sentence(3),
                'instegram' => $faker->sentence(3),
                'twiter' =>  $faker->sentence(3),
                'map' =>  $faker->sentence(3),
                'theTextEn' =>  $faker->paragraphs(60, true),
                'theTextTr' =>  $faker->paragraphs(60, true),
                'thePhoto' => '1660549861.png',
                'category_id' => Category::all()->random()->id,
                'subCategory_id' =>Subcategory::all()->random()->id,
                'user_id' => 2,
            ]);
       }
    }
}
