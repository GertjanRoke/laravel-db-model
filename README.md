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
    public $table = 'posts';
    
    // public $connection = 'mysql';
}

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
