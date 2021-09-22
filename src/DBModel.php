<?php

namespace GertjanRoke\LaravelDbModel;

use Closure;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @mixin DB
 */
class DBModel
{
    /**
     * @var Closure|Builder|string
     */
    public $table;

    public string $as = '';

    public string $connection = '';

    protected Builder $db;

    public function __construct()
    {
        $this->db = DB::connection($this->connection ?: null)->table($this->getTable(), $this->as ?: null);
    }

    /**
     * @return Closure|Builder|string
     */
    public function getTable()
    {
        return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this)));
    }

    public function getDB(): Builder
    {
        return $this->db;
    }

    /**
     * @param string $method
     * @param array $parameters
     *
     * @return Builder|self|Collection
     */
    public function __call($method, $parameters)
    {
        $response = $this->db->$method(...$parameters);

        return ($response instanceof Builder) ? $this : $response;
    }

    /**
     * @param string $method
     * @param array $parameters
     *
     * @return Builder|self|Collection
     */
    public static function __callStatic($method, $parameters)
    {
        return (new static())->$method(...$parameters);
    }
}
