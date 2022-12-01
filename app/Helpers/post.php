<?php

namespace App\Helpers;

use App\Models\Links;
use App\Models\PostActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Validator;



class Post
{
    private static  $postId;
    private static $userId;
    private static $tableName;
    private static $isActive;



    public  static  function post($postId,$userId,$tableName,$isActive)
    {

        self::$postId = $postId;
        self::$userId = $userId;
        self::$tableName = $tableName;
        self::$isActive = $isActive;

        $post = new PostActive;
        $post->post_id = self::$postId;
        $post->user_id = self::$userId;
        $post->table_name =  self::$tableName;
        $post->isActive =  self::$isActive;
        $post->save();
        return 2;
    }
    public  static  function updatePost($postId,$userId,$tableName,$isActive)
    {
        self::$postId = $postId;
        self::$userId = $userId;
        self::$tableName = $tableName;
        self::$isActive = $isActive;

        $post =PostActive::where('post_id',self::$postId)->where('user_id',self::$userId)->firstOrFail();
        $post->isActive = self::$isActive;
        $post->update();
        return 1;
    }

}
