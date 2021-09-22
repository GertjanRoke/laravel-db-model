# Laravel DB Model

[![Latest Version on Packagist](https://img.shields.io/packagist/v/GertjanRoke/laravel-db-model.svg?style=flat-square)](https://packagist.org/packages/GertjanRoke/laravel-db-model)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/GertjanRoke/laravel-db-model/run-tests?label=tests)](https://github.com/GertjanRoke/laravel-db-model/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/GertjanRoke/laravel-db-model/Check%20&%20fix%20styling?label=code%20style)](https://github.com/GertjanRoke/laravel-db-model/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/GertjanRoke/laravel-db-model.svg?style=flat-square)](https://packagist.org/packages/GertjanRoke/laravel-db-model)

A model wrapper around the DB class to keep your code clean.

## Installation

You can install the package via composer:

```bash
composer require gertjanroke/laravel-db-model
```

## Usage

```php
<?php

namespace App\Models;

use GertjanRoke\LaravelDbModel\DBModel;

class Post extends DBModel
{
    // public $table = 'posts';
    
    // public $connection = 'mysql';
}
```
If no table name was given it will guess it based on the class name just like the Eloquent model those.  
Same for the connection, if none is set it will use the default connection.

## How to extend custom scopes
It's basically the same as for Eloquent models, you would need to prefix the methods with `scope`  
```php
...

class Post extends DBModel
{
    public function scopeActive()
    {
        $this->db->where('active', true);

        return $this;
    }
}
```

## Some examples

You can easly create short functions for basic where's or even more complex queries so you have it always in one location instead of everywhere in your code base.
```php
<?php

namespace App\Models;

use App\Models\Comment;
use GertjanRoke\LaravelDbModel\DBModel;

class Post extends DBModel
{
    public function scopeActive(): self
    {
        $this->db->where('active', true);

        return $this;
    }
    
    public function scopeWithLatestComment(): self
    {
        $postTable = $this->getTable();
        $commentTable = (new Comment())->getTable();
        
        $this->db->join($commentTable, "{$commentTable}.post_id", '=', "{$postTable}.id")
            ->addSelect("{$commentTable}.body");

        return $this;
    }
}

// Inside your controller
$post = Post::active()->withLatestComment()->latest()->first();

// Keep in mind the order of calling methods doesn't matter as long as the method before returned the builder instance.
// Like this example will return the same result as the query above.
$post = Post::active()->latest()->withLatestComment()->first();

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Gertjan Roke](https://github.com/GertjanRoke)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
