<?php

/**
 * timestamp Jul 9, 2012 9:24:47 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\event
 *
 *  Class that hides multiple observers as one.
 *
 */

namespace callow\event;

class Observers implements Observer
{

    /**
     *  The collection of observers.
     * @var array $observers
     * @access private
     */
    private $observers = array();

    public function __construct(array $observers = NULL)
    {

    }

    public function addObserver(Observer &$o)
    {
        $this->observers[] = $o;
        return $this;
    }

    public function addObservers(array $observers)
    {
        foreach ($observers as &$o)
        {
            $this->addObserver($o);
        }

        return $this;
    }

    public function flush()
    {

        $list = $this->observers;
        $this->observers = NULL;
        return $list;

    }

    public  function notify(Event &$event)
    {

        $result = FALSE;

        foreach ($this->observers as $o)
        {
            $result = $o->notify($event);
        }

        return $result;



    }



}

?>
