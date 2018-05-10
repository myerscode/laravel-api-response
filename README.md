# Laravel API Response
> A fluent helper class to ensure idempotent API responses in Laravel and Lumen

This package ensures your API will always return the same envelope shape, so consuming apps always know what to expect!

## Install

You can install this package via composer:

``` bash
composer require myerscode/laravel-api-response
```

## Usage

When using a Laravel controller you can simply return a chained `Builder` from the `api()` helper, 
as it implements the [Responsable](https://laravel.com/api/master/Illuminate/Contracts/Support/Responsable.html) trait.

```php

function handler()
{
    return api()->status(201)->data(['name' => 'Foo Bar'])->message('Record Created!');
}
```

Would return the following `JSON`

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

You can alternatively call `api()->respond()` to get a `JsonResponse`


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.