# Laravel API Response
> A fluent helper to provide a consistent shaped API responses in Laravel

[![Latest Stable Version](https://poser.pugx.org/myerscode/laravel-api-response/v/stable)](https://packagist.org/packages/myerscode/laravel-api-response)
[![Total Downloads](https://poser.pugx.org/myerscode/laravel-api-response/downloads)](https://packagist.org/packages/myerscode/laravel-api-response)
[![License](https://poser.pugx.org/myerscode/laravel-api-response/license)](https://packagist.org/packages/myerscode/laravel-api-response)

## Why is this package helpful?

This package ensures your API will always return the same envelope shape, so consuming apps always know what to expect!

## Install

You can install this package via composer:

``` bash
composer require myerscode/laravel-api-response
```

## Usage

In a Laravel controller you just to build up your response and return it! 

The `api()` helper return a Response `Builder` and as it implements the [Responsable](https://laravel.com/api/master/Illuminate/Contracts/Support/Responsable.html) 
trait you dont need to do anything more than return the builder

### Using the api() helper function
```php
function resource()
{
    return api()->status(201)->data(['name' => 'Foo Bar'])->message('Record Created!');
}
```

### Using a Builder class
```php

function resource() {
    $buillder = new Builder();
    $builder->status(201)->data(['name' => 'Foo Bar'])->message('Record Created!');
    return $builder;
}
```


Would return the following `JSON` response.

```json
{
    "status": 201,
    "data": {
        "name": "Foo Bar"
    },
    "meta": [],
    "messages": [
        "Record Created!"
    ]
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
