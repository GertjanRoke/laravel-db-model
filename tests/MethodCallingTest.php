<?php

use GertjanRoke\LaravelDbModel\Tests\Models\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;

uses(RefreshDatabase::class);

it('will return it self when the method called returns the builder class', function () {
    $model = new Model();

    $returned = $model->where('column', true);

    expect($returned)->toBeInstanceOf($model::class);
});

it('will return the collection when the db class returns a collection', function () {
    $model = new Model();

    $returned = $model->get();

    expect($returned)->toBeInstanceOf(Collection::class);
});

it("doesn't matter in which order you call the query methods", function () {
    $grammer = (new Model())->getDB()->grammar;

    $query = Model::where('title', 'Hello World')->active()->toSql();

    expect($query)->toEndWith($grammer->wrap('title') . ' = ? and ' . $grammer->wrap('active') . ' = ?');

    $query = Model::active()->where('title', 'Hello World')->toSql();

    expect($query)->toEndWith($grammer->wrap('active') . ' = ? and ' . $grammer->wrap('title') . ' = ?');
});
