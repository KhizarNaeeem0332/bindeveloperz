<?php

namespace Bindeveloperz\Toast\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static info(string $string)
 * @method static warning(string $string)
 * @method static success(string $string)
 * @method static error(string $string)
 * @method  title(string $string)
 * @method  close()
 * @method  persist()
 */
class Toast extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor()
    {
        return 'toast';
    }
}