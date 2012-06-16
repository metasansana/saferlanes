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
 * Implementation of the EvetListenerInterface.
 *
 * Use this class instead of implementing EventListenerInterface when possible (keeps code cleaner).
 *
 */

namespace callow\event;


abstract class EventHost implements EventHostInterface
{

    /**
     * Stores the EventListenerInterface object.
     * @var array notified
     * @access protected
     */
    protected $notified = array();

    public function register(Subscriber &$notified)
    {
        $this->notified[] = $notified;

    }

    public function flush()
    {

        $temp = $this->notified;
        $this->notified = NULL;
        return $temp;

    }

    public function getSubscribers()
    {
        return $this->notified;

    }

}

?>
