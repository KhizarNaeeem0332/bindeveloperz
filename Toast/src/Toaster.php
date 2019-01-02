<?php

namespace Bindeveloperz\Toast;


class Toaster
{

    protected $session ;
    public $messages ;


    public function __construct(ToastSessionStore $session)
    {
        $this->session = $session;
        $this->messages = collect();
    }


    public function info($message)
    {
        return  $this->message($message, 'info') ;
    }


    public function success($message)
    {
        return  $this->message($message, 'success');
    }


    public function warning($message)
    {
        return  $this->message($message, 'warning') ;
    }


    public function error($message)
    {
        return  $this->message($message, 'error') ;
    }


    public function close()
    {
        return $this->updateLastMessage(['close' => true]);
    }

    public function progress()
    {
        return $this->updateLastMessage(['close' => true]);
    }

    public function position($name = "top-right")
    {
        return $this->updateLastMessage(['position' => 'toast-' . $name]);
    }



    public function persist()
    {
        return $this->updateLastMessage(['persist' => true]);
    }



    public function title($data)
    {
        return $this->updateLastMessage(['title' => $data]);
    }




    public function clear()
    {
        $this->messages = collect();
        return $this;
    }

    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }

    protected function message($message  = null, $type = 'info')
    {

        // If no message was provided, we should update
        // the most recently added message.
        if (! $message) {
            return $this->updateLastMessage (compact('type'));
        }

        if (! $message instanceof Message) {
            $message = new Message(compact('message', 'type'));
        }

        $this->messages->push($message);
        return $this->flash();
    }

    /**
     * Flash all messages to the session.
     */
    protected function flash()
    {
        $this->session->flash('bindeveloperz_toast', $this->messages);
        return $this;
    }


}