<?php

namespace App\Providers;

use App\Models\Rubric;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        //Прослушивание запросов на страницах
//        DB::listen(function($query) {
//            dump($query->sql);
//        });

        //Рубрика станет доступная для всех страниц с шаблоном футер
        view()->composer('layouts.footer', function ($view) {
           $view->with('rubrics', Rubric::all());
        });
    }
}
