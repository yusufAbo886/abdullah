<?php

namespace App\Helpers;

use App\Models\Links;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Validator;



class Languge
{


    public  static  function post()
    {
        $theLang = session()->get('applocale');

        switch ($theLang) {
            case "tr":
                $lang = array(
                    'theTitle' => 'theTitleTr AS theTitle',
                    'theText'=>'theTextTr AS theText'
                );
                break;

            default :
                $lang = array(
                    'theTitle' => 'theTitleEn AS theTitle',
                    'theText'=>'theTextEn AS theText'
                );

                break;
        }

       return  $lang;


    }
    public  static  function category()
    {
        $theLang = session()->get('applocale');

        switch ($theLang) {
            case "tr":
                $lang = array(
                    'theName' => 'theNameTr AS theName',
                );
                break;

            default :
                $lang = array(
                    'theName' => 'theNameEn AS theName',
                );

                break;
        }

        return  $lang;
    }

}
