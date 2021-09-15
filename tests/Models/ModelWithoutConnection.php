<?php

namespace GertjanRoke\LaravelDbModel\Tests\Models;

use GertjanRoke\LaravelDbModel\DbModel;

class ModelWithoutConnection extends DbModel
{
    public $table = 'model-without-connection';
}
