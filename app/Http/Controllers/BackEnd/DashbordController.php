<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
  public function  index(){

//      $user = Auth::user();
////      return $user->user->role;
     return view("admin.dashbord.index");

  }
}
