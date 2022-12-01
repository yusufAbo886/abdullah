<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HospitalPost;
use App\Models\PostActive;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostActiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Factory::create();
        $posts = HospitalPost::all()->pluck('id')->toArray();

        foreach($posts as $post)  {
            PostActive::create([
                'post_id' => $post,
                'user_id' => 2,
                'table_name' =>"hospitalPost",
            ]);
        }
    }
}
