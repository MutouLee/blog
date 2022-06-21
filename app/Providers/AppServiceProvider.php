<?php

namespace App\Providers;

use App\Models\Navigation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);

        //导航数据
        $navigation = Navigation::query()->where('parent_id', 0)->where('show', 1)->orderBy('order')->get();
        View::share(compact('navigation'));
    }
}
