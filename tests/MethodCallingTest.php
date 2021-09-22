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
