<?php

/**
 * timestamp May 8, 2012 4:51:22 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\event
 *
 *  Interface of classes wishing to suscribe to events.
 *
 */

namespace callow\event;

interface Observer
{


    /**
     * Notices and processes an event, should return FALSE if the event cannot be handled.
     */
    public function notify(Event &$event);


}

?>
