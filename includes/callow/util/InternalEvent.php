<?php

/**
 * timestamp Jul 14, 2012 5:49:20 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Parent class for events that are used by the lower levels of the system/
 *
 */

namespace callow\util;

abstract class InternalEvent extends AbstractEvent
{

    /**
     *  Optional code used to distingush different internal events.
     * @var int $id;
     * @access protected
     */
    protected $id;

    /**
     * Optional message associated with the event.
     * @var string $message
     */
    protected $message;

    public function __construct(EventSource &$src, $id, $message = "")
    {
        $this->id = $id;
        $this->message = (string)$message;
        parent::__construct($src);
    }


    public function getId()
    {
    return $this->id;
    }

    public function getMessage()
    {
        return $this->message;
    }

        public function __toString()
    {
        return $this->getMessage();
    }



}

?>
