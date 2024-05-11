<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Client;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected static $migrationsRun = false;

    public function setUp(): void
    {
        parent::setUp();

        if (! static::$migrationsRun) {
            Artisan::call('key:generate');
            if (!Client::where('personal_access_client', true)->exists()) {
                Artisan::call('passport:client --personal --name="Test"');
            }
            Artisan::call('migrate');
            static::$migrationsRun = true;
        }
    }
}
