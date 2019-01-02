<?php

namespace Bindeveloperz\Alert ;


use Bindeveloperz\Alert\Contracts\IAlert;
use Illuminate\Session\Store;

/**
 * Class AlertSessionStore
 * @package Bindeveloperz\Alert
 */
class AlertSessionStore implements IAlert
{


    /**
     * @var Store
     */
    private $_session ;

    /**
     * AlertSessionStore constructor.
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->_session = $session;
    }


    /**
     * @param $data
     * @param $msg
     */
    public function flash($data, $msg)
    {
       $this->_session->flash($data , $msg);
    }

}
