<?php

declare(strict_types=1);

use Myerscode\Laravel\ApiResponse\Builder;

if (!function_exists('api')) {
    function api(): Builder
    {
        return new Builder();
    }
}
