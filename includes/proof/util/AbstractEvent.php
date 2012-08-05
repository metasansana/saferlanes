<?php
namespace proof\util;
/**
 * timestamp Jul 28, 2012 11:38:55 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Abstract class for the Event interface.
 *
 */
abstract class AbstractEvent implements Event
{

    /**
     * The source of this event.
     * @var Object $src
     * @access protected
     */
    protected $src;

    public function __construct($src)
    {

        $this->src = $src;

    }

    /**
     * Returns the source object of this event
     * @return Object
     */
    public function getSource()
    {
        return $this->src;

    }

}