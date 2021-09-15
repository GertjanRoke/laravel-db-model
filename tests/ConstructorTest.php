<?php

use GertjanRoke\LaravelDbModel\Exceptions\MissingTableNameException;
use GertjanRoke\LaravelDbModel\Tests\Models\Model;
use GertjanRoke\LaravelDbModel\Tests\Models\ModelWithMySqlConnection;
use GertjanRoke\LaravelDbModel\Tests\Models\ModelWithoutConnection;
use GertjanRoke\LaravelDbModel\Tests\Models\ModelWithoutTableName;

it('throws an exception when no table name is set', function () {
    ModelWithoutTableName::where('column', 1);
})->throws(MissingTableNameException::class);

it('can prefill the connection', function () {
    $query = ModelWithoutConnection::where('column', 1);

    expect(class_basename($query->connection))->toStartWith('SQLiteConnection');

    $query = ModelWithMySqlConnection::where('column', 1);

    expect(class_basename($query->connection))->toStartWith('MySqlConnection');
});

it('can prefill the table name', function () {
    $query = Model::where('column', 1);

    expect($query->from)->toBe('models');
});
