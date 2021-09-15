<?php

namespace GertjanRoke\LaravelDbModel;

use Closure;
use GertjanRoke\LaravelDbModel\Exceptions\MissingTableNameException;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

/**
 * @mixin DB
 */
class DbModel
{
    /**
     * @var Closure|Builder|string
     */
    public $table;

    public string $as = '';

    public string $connection = '';

    protected Builder $db;

    /**
     * @throws MissingTableNameException
     */
    public function __construct()
    {
        if (empty($this->getTable())) {
            throw new MissingTableNameException();
        }

        $this->db = DB::connection($this->connection ?: null)->table($this->getTable(), $this->as ?: null);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function __call($method, $parameters): Builder
    {
        return $this->db->$method(...$parameters);
    }

    public static function __callStatic($method, $parameters): Builder
    {
        return (new static())->$method(...$parameters);
    }
}
