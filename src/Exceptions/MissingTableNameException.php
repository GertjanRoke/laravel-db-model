<?php

namespace GertjanRoke\LaravelDbModel\Exceptions;

use Exception;

class MissingTableNameException extends Exception
{
    protected $message = 'No table name was set on public property $table';

    protected $code = 500;
}
