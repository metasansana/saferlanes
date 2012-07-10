<?php

/**
 * @timestamp Apr 17, 2012 4:50:01 AM
 *
 *
 * @project callow
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\event
 *
 * IAbstract class that implements the EventHost interface. Child classes generally do not have
 * to alter the methods here much.
 *
 *
 */

namespace callow\event;


abstract class AbstractObservable implements Observable
{

    /**
     * Stores the EventListenerInterface object.
     * @var array $subscribers
     * @access protected
     */
    protected $subscribers = array();

    public function register(Observer &$notified)
    {
        $this->subscribers[] = $notified;

    }

    protected function fire(Event &$event)
    {
        foreach($this->subscribers as &$o)
        {
            $o->notify($event);
        }
    }

    public function flush()
    {

        $temp = $this->subscribers;
        $this->subscribers = NULL;
        return $temp;

    }

    public function getSubscribers()
    {
        return $this->subscribers;

    }


    protected function pack($label, $item, AbstractEvent &$event)
    {
        $event->store($label, $item);

        return $this;
    }

}

?>
