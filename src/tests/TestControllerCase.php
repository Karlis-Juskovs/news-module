<?php

namespace Karlis\Module1\tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestControllerCase extends OrchestraTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            \Karlis\Module1\Module1ServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Ensure database migrations are applied
        Artisan::call('migrate');
    }
}
