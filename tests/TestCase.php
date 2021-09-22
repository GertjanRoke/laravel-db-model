<?php

namespace GertjanRoke\LaravelDbModel\Tests;

use GertjanRoke\LaravelDbModel\LaravelDbModelServiceProvider;
use GertjanRoke\LaravelDbModel\Tests\migrations\ModelTableMigration;
use Orchestra\Testbench\TestCase as Orchestra;

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

        (new ModelTableMigration())->up();
    }
}
