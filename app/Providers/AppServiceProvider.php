<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $menu_link = DB::table('menu_link')->get();
//        $sub_menu_link = DB::table('cities')->get();
//        $footer = DB::table('footer')->get();
//        view()->share('menu_link',$menu_link,'sub_menu_link', $sub_menu_link);

    }
}
