<?php

namespace GertjanRoke\LaravelDbModel\Tests\Models;

use GertjanRoke\LaravelDbModel\DBModel;

class ModelWithMySqlConnection extends DBModel
{
    public $table = 'model-with-mysql-connection';

    public string $connection = 'mysql';
}
