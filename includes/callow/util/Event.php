<?php

/**
 * timestamp Jul 13, 2012 11:17:03 PM
 *
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Top level parent class of all event type classes. A events are varied across applications but are
 *  used to pass messages or 'snapshots' of a class when something has occured that may require
 *  external action(s).
 *
 */

namespace callow\util;

class Event
{

    /**
     * Internal reference to the class that fired the event.
     * @var EventSource $src
     * @access protected
     */
    protected $src;

    public function __construct(EventSource &$src)
    {

        $this->src = $src;

    }

    /**
     * Returns a reference to the EventSource object.
     * @return EventSource
     */
    public function getSource()
    {
        return $this->src;
    }

}

?>
