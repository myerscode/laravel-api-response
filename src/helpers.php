<?php

if (!function_exists('api')) {

    /**
     * Start creating a idempotent api response
     *
     * @return \Myerscode\Laravel\ApiResponse\Builder
     */
    function api()
    {
        return new \Myerscode\Laravel\ApiResponse\Builder();
    }
}
