<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable=['theNameEn','theNameTr','category_id'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function links(){
        return $this->hasOne(Links::class,'content_id');
    }
//    public function HospitalPost(){
//        return $this->hasMany(Subcategory::class,'subCategory_id');
//    }
//    public function Posts(){
//        return $this->hasMany(HospitalPost::class,'category_id');
//    }

}
