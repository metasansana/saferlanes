<?php

/**
 * timestamp Jul 14, 2012 8:05:41 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  The Signal class is the parent class of events that indicate an internal change within an application.
 *
 */

namespace callow\app;

use callow\util\Event;
use callow\util\EventSource;

abstract class Signal extends Event
{

    /**
     * The message associated with the signal
     * @var string $message
     * @access protected
     */
    protected $message;


    public function __construct(EventSource &$src, $message)
    {

        $this->message = (string)$message;
        parent::__construct($src);

    }

    public function __toString()
    {
        return $this->message;
    }


}

?>
