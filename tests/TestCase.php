<?php

namespace GertjanRoke\LaravelDbModel\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use GertjanRoke\LaravelDbModel\LaravelDbModelServiceProvider;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            LaravelDbModelServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
