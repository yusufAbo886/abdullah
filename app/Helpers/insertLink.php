<?php

namespace App\Helpers;

use App\Models\Links;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Validator;



class InsertLinks
{
    private static $id;
    private static  $url;
    private static $page;

    public  static  function link($id,$url,$page)
    {

//        $validator = Validator::make(['url' => $url], [
//            'url' => 'required|unique:links',
//        ]);
//
//
//        if ($validator->fails()) {
//            return 1;
//        }else{
            self::$id = $id;
            self::$url = $url;
            self::$page = $page;

            $link = new links;
            $link->url = self::$url;
            $link->page = self::$page;
            $link->content_id =  self::$id;
            $link->save();
            return 2;
//        }

    }
    public  static  function update($id,$url,$page)
    {
        self::$id = $id;
        self::$url = $url;
        self::$page = $page;

        $link =Links::where('content_id',self::$id)->where('page',self::$page)->firstOrFail();
        $link->url = self::$url;
        $link->page = self::$page;
        $link->update();

        return 1;
    }
    public  static  function delete($id,$page)
    {
        self::$id = $id;
        self::$page = $page;
        $link =Links::where('content_id',self::$id)->where('page',self::$page)->firstOrFail();
        $link->delete();

        return 1;
    }
}
