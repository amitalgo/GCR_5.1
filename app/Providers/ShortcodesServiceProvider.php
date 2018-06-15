<?php

namespace App\Providers;

use App\Shortcodes\ProductShortcode;
use Illuminate\Support\ServiceProvider;

use App\Shortcodes\BoldShortcode;
use Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('b', BoldShortcode::class);
        Shortcode::register('product', ProductShortcode::class);
    }
}
