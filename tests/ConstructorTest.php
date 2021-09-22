<?php

use GertjanRoke\LaravelDbModel\Tests\Models\Model;
use GertjanRoke\LaravelDbModel\Tests\Models\ModelWithMySqlConnection;
use GertjanRoke\LaravelDbModel\Tests\Models\ModelWithoutConnection;
use GertjanRoke\LaravelDbModel\Tests\Models\ModelWithoutTableName;

it('can prefill the connection', function () {
    $model = new ModelWithoutConnection();

    expect(class_basename($model->getDB()->connection))->toStartWith('SQLiteConnection');

    $model = new ModelWithMySqlConnection();

    expect(class_basename($model->getDB()->connection))->toStartWith('MySqlConnection');
});

it('can prefill the table name', function () {
    $model = new Model();

    expect($model->getDB()->from)->toBe('models');
});

it('can make the table name from the class name', function () {
    $model = new ModelWithoutTableName();


    expect($model->getDB()->from)->toBe('model_without_table_names');
});
