<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPost extends Model
{
    use HasFactory;
    protected $fillable=['theTitleEn','theTitleTr','theLocation','thePhone','theEmail','theWebsite',
        'facebook', 'instegram', 'twiter', 'map',
        'theTextEn','theTextTr','thePhoto','user_id'];
}
