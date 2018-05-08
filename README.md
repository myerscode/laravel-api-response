# Laravel API Response
> A fluent helper and facade to ensure consistent, idempotent API responses in Laravel and Lumen

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
    return api()->status(201)->data(['name' => 'Foo Bar'])->message('Created record');
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
        "Created record"
    ]
}
```

You can alternatively call `api()->respond()` to get a `JsonResponse`


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.