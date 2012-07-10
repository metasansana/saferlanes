<?php

/**
 * @timestamp Apr 16, 2012 10:18:50 PM
 *
 *
 * @project callow
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow
 *
 * Class that represents some kind of event.
 *
 *
 *
 *
 *
 *
 */

namespace callow\event;

class AbstractEvent implements Event
{

    /**
     * Holds a reference to the class that generated the event.
     * @var Observable $src
     * @access protected
     */
    protected $src;

    /**
     * Optional message for the event, anything passed to this will be casted to a string.
     * @var string $message
     * @access protected
     */
    protected $message;

    /**
     * Stores references to some object, data, structure etc that was involved with the event.
     * @var array $state
     */
    protected $cache = array();

    public function __construct($message=NULL, Observable &$src = NULL)

    {

        $this->src = $src;

        $this->message = (string)$message;

    }

    /**
     * Returns a reference to the Observable that fired the event,
     * @return Observable
     */
    public function getSource()

    {

        return $this->src;


    }

    public function typeOf($class_name)
    {
        return (get_class($this) === (string)$class_name);
    }

    public function put($label, $item)
    {
        $this->cache[$label] = $item;
    }

    public function get($label)
    {
        return $this->cache[$label];
    }

    public function __toString()
    {
        return $this->message;
    }

}

?>
