<?php

/**
 * timestamp Jul 13, 2012 11:39:44 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Interface that forms the root of all event listener type classes.
 *
 *
 */

namespace callow\util;

abstract class EventListener
{

    /**
     *  Informs the listener of an event.
     * @param Event $e
     */
    public function notify(Event $e)
    {

    }

    /**
     * Returns true if the listener accepts the even $e or false if otherwise.
     */
    abstract public function accepts(Event $e);


}

?>
