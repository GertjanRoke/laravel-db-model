<?php

namespace GertjanRoke\LaravelDbModel\Tests\Models;

use GertjanRoke\LaravelDbModel\DBModel;

class Model extends DBModel
{
    public function scopeActive(): self
    {
        $this->db->where('active', true);

        return $this;
    }
}
