<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\HospitalPost;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Links;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
       $categories = Category::all()->pluck('id')->toArray();
        foreach($categories as $category)  {
            Links::create([
                "url"=>$faker->name.time() ,
                "page" => "category",
                "content_id" => $category,

            ]);
        }
        $subcategories = Subcategory::all()->pluck('id')->toArray();

        foreach($subcategories as $sub)  {
            Links::create([
                "url"=>$faker->name.time() ,
                "page" => "subcategory",
                "content_id" => $sub,

            ]);
        }

        $posts = HospitalPost::all()->pluck('id')->toArray();
        foreach($posts as $post) {
            Links::create([
                "url"=> str_replace([':', '\\', '/', '*',' ','.'],"-",$faker->sentence(3).time()),
                "page" => "hospitalPost",
                "content_id" => $post,

            ]);
        }
        $blog = Blog::all()->pluck('id')->toArray();
        foreach($blog as $bl) {
            Links::create([
                "url"=>  permalink($faker->sentence(3).time()),
                "page" => "blog",
                "content_id" => $bl,

            ]);
        }

        }




    }

