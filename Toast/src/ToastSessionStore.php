<?php


namespace Bindeveloperz\Toast;


use Illuminate\Session\Store;

class ToastSessionStore
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