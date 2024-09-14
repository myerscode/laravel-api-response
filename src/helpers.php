<?php

use Myerscode\Laravel\ApiResponse\Builder;
if (!function_exists('api')) {

    /**
     * Start creating a idempotent api response
     */
    function api(): Builder
    {
        return new Builder();
    }
}
