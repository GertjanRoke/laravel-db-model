<?php

namespace GertjanRoke\LaravelDbModel\Tests\Models;

use GertjanRoke\LaravelDbModel\DbModel;

class ModelWithMySqlConnection extends DbModel
{
    public $table = 'model-with-mysql-connection';

    public string $connection = 'mysql';
}
