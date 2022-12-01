<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['theNameEn','theNameTr'];

    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }
//    public function Posts(){
//        return $this->hasMany(HospitalPost::class,'category_id');
//    }
}

