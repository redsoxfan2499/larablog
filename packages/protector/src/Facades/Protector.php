<?php

namespace HyperdriveDesigns\Protector\Facades;

use Illuminate\Support\Facades\Facade;

class Protector extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'protector';
    }
}
