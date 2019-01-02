<?php

namespace Bindeveloperz\Alert ;


class Alerter
{

    /**
     * @var AlertSessionStore
     */
    protected $session ;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $messages ;


    /**
     * Alerter constructor.
     * @param AlertSessionStore $session
     */
    public function __construct(AlertSessionStore $session)
    {
        $this->session = $session;

        $this->messages = collect();

    }

    /**
     * @param $message
     * @return Alerter
     */
    public function info($message)
    {
       return  $this->message($message, 'info') ;
    }


    /**
     * @param $message
     * @return Alerter
     */
    public function primary($message)
    {
        return  $this->message($message, 'primary') ;
    }


    /**
     * @param $message
     * @return Alerter
     */
    public function secondary($message)
    {
        return  $this->message($message, 'secondary') ;
    }


    /**
     * @param $message
     * @return Alerter
     */
    public function dark($message)
    {
        return  $this->message($message, 'dark') ;
    }


    /**
     * @param $message
     * @return Alerter
     */
    public function light($message)
    {
        return  $this->message($message, 'light') ;
    }


    /**
     * @param $message
     * @return Alerter
     */
    public function success($message)
    {
        return  $this->message($message, 'success') ;
    }

    /**
     * @param $message
     * @return Alerter
     */
    public function warning($message)
    {
        return  $this->message($message, 'warning') ;
    }


    /**
     * @param $message
     * @return Alerter
     */
    public function danger($message)
    {
        return  $this->message($message, 'danger') ;
    }




    /**
     * Add  close button to alerter
     *
     * @return $this
     */
    public function close()
    {
        return $this->updateLastMessage(['close' => true]);
    }

    /**
     * Add mt_alert_notification class to alert to auto close alert
     *
     * @return $this
     */
    public function autoClose()
    {
        return $this->updateLastMessage(['autoClose' => true]);
    }


    /**
     * Add rounded alert
     *
     * @return $this
     */
    public function rounded()
    {
        return $this->updateLastMessage(['rounded' => true]);
    }


    /**
     * Add title to alert if boxed function is called
     *
     * @param $data
     * @return $this
     */
    public function title($data)
    {
        return $this->updateLastMessage(['title' => $data]);
    }



    /**
     * Add square box alert with title
     *
     * @return $this
     */
    public function boxed()
    {
        return $this->updateLastMessage(['boxed' => true]);
    }




    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear()
    {
        $this->messages = collect();

        return $this;
    }



    /**
     * Modify the most recently added message.
     *
     * @param  array $overrides
     * @return $this
     */
    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }


    /**
     * Flash a general message.
     *
     * @param  string|null $message
     * @param  string|null $type
     * @return $this
     */
    protected function message($message, $type)
    {

        // If no message was provided, we should update
        // the most recently added message.
        if (! $message) {
            return $this->updateLastMessage(compact('type'));
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
        $this->session->flash('bindeveloperz_alert', $this->messages);

        return $this;
    }

}
