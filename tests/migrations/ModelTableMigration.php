<?php

namespace GertjanRoke\LaravelDbModel\Tests\migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModelTableMigration
{
    public function up()
    {
        Schema::create('models', function(Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
}
