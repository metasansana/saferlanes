<?php

/**
 * @timestamp Apr 17, 2012 5:06:30 AM
 *
 *
 * @project callow
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow
 *
 *  Inteface for classes that generate events.
 *
 * Use the EventSource class instead where possible. This interface is
 * to be used when the interested class is already a subclass.
 *
 */

namespace callow\event;

interface EventHostInterface
{

    /**
     * Registers a Subscriber object.
     */
    public function register(Subscriber &$notified);


    /**
     * Removes all subscribers and returns them for temporary storage.
     */
    public function flush();


    /**
     * Returns the current listener.
     */
    public function getSubscribers();


}

?>
