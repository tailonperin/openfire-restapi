<?php

namespace Tailonperin\OpenfireRestapi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tailonperin\OpenfireRestapi\Skeleton\SkeletonClass
 */
class OpenfireRestapiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'openfire-restapi';
    }
}
