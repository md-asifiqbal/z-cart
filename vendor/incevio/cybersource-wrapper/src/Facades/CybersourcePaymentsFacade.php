<?php namespace Incevio\Cybersource\Facades;

use Illuminate\Support\Facades\Facade;

class CybersourcePaymentsFacade extends Facade
{
    /**
     * Return facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
    	return 'cybersource-payments';
    }
}

