<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalPost extends Model
{
    use HasFactory;
    protected $fillable=['theTitleEn','theTitleTr','theLocation','thePhone','theEmail','theWebsite',
        'facebook', 'instegram', 'twiter', 'map',
        'theTextEn','theTextTr','thePhoto','category_id', 'subCategory_id','user_id'];

    public function subcategory(){
        return $this->hasOne(Subcategory::class,'id','subCategory_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
 }
