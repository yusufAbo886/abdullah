<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [ 'theNameEn' => 'Tummy Tuck','theNameTr' => 'Karın Germe','category_id' => 5],
            [ 'theNameEn' => 'Arm and Leg Stretching','theNameTr' => 'Kol ve Bacak Germe','category_id' => 5],
            [ 'theNameEn' => 'Liposuction (Fat Removal)','theNameTr' => 'Liposuction (Yağ Aldırma)','category_id' => 5],
            [ 'theNameEn' => 'Fat Injection','theNameTr' => 'Yağ Enjeksiyonu','category_id' => 5],
            ['theNameEn' => 'Butt Lift Aesthetics','theNameTr' => 'Popo Kaldırma Estetiği','category_id' => 5],

            ['theNameEn' => 'Breast Augmentation','theNameTr' => 'Meme büyütme','category_id' => 7],
            ['theNameEn' => 'Breast Reduction','theNameTr' => 'Meme küçültme','category_id' => 7],
            ['theNameEn' => 'Breast Lift','theNameTr' => 'Göğüs Kaldırma','category_id' => 7],
            ['theNameEn' => 'Gynecomastia','theNameTr' => 'Jinekomasti','category_id' => 7],
            ['theNameEn' => 'Breast Reconstruction','theNameTr' => 'Meme Rekonstrüksiyonu','category_id' => 7],

            ['theNameEn' => 'Face Lift','theNameTr' => 'Yüz Germe','category_id' => 6],
            ['theNameEn' => 'Neck Stretch','theNameTr' => 'Boyun Streç','category_id' => 6],
            ['theNameEn' => 'Ear Aesthetics','theNameTr' => 'Kulak Estetiği','category_id' => 6],
            ['theNameEn' => 'Lip Aesthetics','theNameTr' => 'Dudak Estetiği','category_id' => 6],
            ['theNameEn' => 'Neck and Face Sagging','theNameTr' => 'Boyun ve Yüz Sarkması','category_id' => 6],


            ['theNameEn' => 'Open Nose Surgery ','theNameTr' => 'Açık Burun Ameliyatı','category_id' => 8],
            ['theNameEn' => 'Neck Stretch','theNameTr' => 'Boyun Streç','category_id' => 8],
            ['theNameEn' => 'Ear Aesthetics','theNameTr' => 'Kulak Estetiği','category_id' => 8],
            ['theNameEn' => 'Lip Aesthetics','theNameTr' => 'Dudak Estetiği','category_id' => 8],
            ['theNameEn' => 'Neck and Face Sagging','theNameTr' => 'Boyun ve Yüz Sarkması','category_id' => 8],


            ['theNameEn' => 'Golden Needle','theNameTr' => 'Altın İğne','category_id' => 9],
            ['theNameEn' => 'Facial Mesolifting','theNameTr' => 'Yüz Mezoliftng','category_id' => 9],
            ['theNameEn' => '6D Star Askısı','theNameTr' => '6D Yıldız Kayışı','category_id' => 9],


            ['theNameEn' => 'Hair Transplant','theNameTr' => 'Saç Ekimi','category_id' => 10],
            ['theNameEn' => 'Beard Transplantation','theNameTr' => 'Sakal Ekimi','category_id' => 10],
            ['theNameEn' => 'Mustache Transplant','theNameTr' => 'Bıyık Ekimi','category_id' => 10],
            ['theNameEn' => 'Eyebrow Transplantation','theNameTr' => 'Kaş Ekimi','category_id' => 10],





        ];

        foreach ($items as $item) {
            Subcategory::create($item);
        }
    }
}
