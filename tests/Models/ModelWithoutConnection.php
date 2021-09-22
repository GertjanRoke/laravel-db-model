<?php

namespace GertjanRoke\LaravelDbModel\Tests\Models;

use GertjanRoke\LaravelDbModel\DBModel;

class ModelWithoutConnection extends DBModel
{
    public $table = 'model-without-connection';
}
