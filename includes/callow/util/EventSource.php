<?php

/**
 * timestamp Jul 13, 2012 11:25:42 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Abstract parent class of classes that are the source of events.
 *
 */

namespace callow\util;

abstract class EventSource
{

    /**
     * An array of references to handlers that events are sent to.
     * @var array $listeners
     * @access protected
     */
    protected $listeners = array();


    /**
     * Registers a reference to a listener to the class.
     * @param EventListener $listener
     * @return \callow\util\EventSource
     */
    public function register(EventListener $listener)
    {

        $this->listeners[] = $listener;
        return $this;

    }

    /**
     * Passes an event to the EventListeners
     * @param Event $e
     */
    protected function fire(Event &$e)
    {
        foreach ($this->listeners as $l)
        {
            $l->notify($e);
        }
    }

}

?>
