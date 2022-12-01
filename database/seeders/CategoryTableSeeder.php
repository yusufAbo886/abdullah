<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [ 'theNameEn' => 'Body Aesthetics','theNameTr' => 'Vücut Estetiği'],
            [ 'theNameEn' => 'Breast Aesthetics','theNameTr' => 'Meme Estetiği'],
            [ 'theNameTr' => 'Yüz Estetiği','theNameEn' => 'Facial Aesthetics'],


            [ 'theNameTr' => 'Burun Estetiği','theNameEn' => 'Nose Aesthetics'],
            [ 'theNameTr' => 'Ameliyatsız Estetiği','theNameEn' => 'Non-Surgical Aesthetics'],
            [ 'theNameTr' => 'Ekim','theNameEn' => 'October'],
            [ 'theNameTr' => 'Tüp Bebek','theNameEn' => 'test tube baby'],
            [ 'theNameTr' => 'Diş Estetiği','theNameEn' => 'Dental Aesthetics'],

        ];

        foreach ($items as $item) {
            Category::create($item);
        }
    }
}
