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

class Event
{

    /**
     * Holds a reference to the class that generated the event.
     * @var src
     * @access protected
     *
     *
     */
    protected $src;

    public function __construct(EventHost &$src = NULL)

    {

        $this->src = $src;

    }

    public function getSource()

    {

        return $this->src;


    }

}

?>
