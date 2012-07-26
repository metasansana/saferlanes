<?php
namespace proof\util;
/**
 * timestamp Jul 25, 2012 1:12:58 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Implementation of the Observer interface
 *
 */
abstract class AbstractObservable implements Observable
{

    /**
     * List of observers.
     * @var Observer $observers
     * @access
     */
    protected $observer;

    public function attachObserver(Observer $o)
    {
        $this->observer = $o;
        return $this;
    }

    public function getObserver()
    {
        return $this->observer;
    }

    public function notify()
    {

            $this->observer->update($this);
    }



}