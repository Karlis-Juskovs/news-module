<?php

namespace Karlis\Module1;

use Illuminate\Support\ServiceProvider;

class Module1ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load the routes, migrations, etc.
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        //
    }
}