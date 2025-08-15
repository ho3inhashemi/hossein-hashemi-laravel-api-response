<?php

namespace HosseinHashemi\LaravelApiResponse\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponseFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'apiـresponse';
    }
}
