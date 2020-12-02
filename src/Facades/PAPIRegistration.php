<?php

namespace Blashbrook\PAPIRegistration\Facades;

use Illuminate\Support\Facades\Facade;

class PAPIRegistration extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'papiregistration';
    }
}
