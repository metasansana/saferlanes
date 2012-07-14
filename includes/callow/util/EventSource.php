<?php

/**
 * timestamp Jul 13, 2012 11:25:42 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Optional parent class for classes that fire events. Events can also be created an published  manually by a
 *  class.
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
    protected function notify(Event &$e)
    {
        foreach ($this->listeners as $l)
        {
            if($l->update($e))
                $l->notify($e);
        }
    }

}

?>
