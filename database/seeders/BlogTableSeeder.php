<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\HospitalPost;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=0; $i<10; $i++)  {
            Blog::create([
                'theTitleEn' => $faker->name,
                'theTitleTr' => $faker->sentence(4),
                'theTextEn' =>  $faker->paragraphs(35, true),
                'theTextTr' =>  $faker->paragraphs(35, true),
                'thePhoto' => '1660549861.png',
            ]);
        }
    }
}
