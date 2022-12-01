<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\IndexCardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//back End
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:super_admin']], function () {

    Route::get('/', [App\Http\Controllers\BackEnd\DashbordController::class, 'index'])->name('dashbord');
    Route::post('/dashbord', [App\Http\Controllers\BackEnd\DashbordController::class, 'store'])->name('dashbord.store');
    Route::post('/dashbords/{id}', [App\Http\Controllers\BackEnd\DashbordController::class, 'destroy'])->name('dashbord.destroy');
    Route::resource('category', App\Http\Controllers\BackEnd\CategoryController::class);
    Route::resource('subcategory', App\Http\Controllers\BackEnd\SubcategoryController::class);
    Route::resource('blog', App\Http\Controllers\BackEnd\BlogController::class);
    Route::resource('clinic', App\Http\Controllers\BackEnd\ClinicController::class);
    Route::resource('users', App\Http\Controllers\BackEnd\UserController::class);
    Route::resource('languge', App\Http\Controllers\BackEnd\LangugeController::class);

});
Route::group(['prefix' => 'admin-hospital', 'middleware' => ['auth', 'role:hospital']], function () {
    Route::get('/', [App\Http\Controllers\Hospital\DashbordController::class, 'index'])->name('dashbord');
    Route::resource('hospital-post', App\Http\Controllers\Hospital\HospitalPostController::class);
    Route::resource('hospital-post-photos', 'App\Http\Controllers\Hospital\HospitalPostSliderController', ['except' => 'create'] );
    Route::get('hospital-post-photos/create/{id}', ['as' => 'hospital-post-photos','uses' => 'App\Http\Controllers\Hospital\HospitalPostSliderController@create']);

});
Route::group(['prefix' => 'admin-doctor', 'middleware' => ['auth', 'role:doctor']], function () {
    Route::get('/', [App\Http\Controllers\doctor\DashbordController::class, 'index'])->name('dashbord');
    Route::resource('doctor-post', App\Http\Controllers\Doctor\DoctorPostController::class);
});
Route::post("upload",[App\Http\Controllers\BackEnd\UploadController::class,"store"])->name("upload");
Route::delete("upload-delete",[App\Http\Controllers\BackEnd\UploadController::class,"destroy"])->name("destroy.delete");

Route::get("/logout",[App\Http\Controllers\Auth\LoginController::class,"logout"])->name("logout");
Route::get("/sign-up-hospital",[App\Http\Controllers\Auth\SignUpController::class,"sign_up_hospital"])->name("few");
Route::post("/create-hospital",[App\Http\Controllers\Auth\SignUpController::class,"create_hospital"])->name("hospital");


// Front End
Route::any('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::any('/{slug}', [App\Http\Controllers\HomeController::class, 'index'])->name('index1');
Route::any('/{slug}/{all}', [App\Http\Controllers\HomeController::class, 'index'])->name('index2');
Route::any('/{slug}/{all}/{bll}', [App\Http\Controllers\HomeController::class, 'index'])->name('index3');
//Route::post("/create-hospital",[App\Http\Controllers\Auth\SignUpController::class,"create_hospital"])->name("hospital");
