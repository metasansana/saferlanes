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
     * @var ArrayList $observers
     * @access
     */
    protected $observers;

    public function __construct()
    {
        $this->observers = new ArrayList();
    }

    public function attachObserver(Observer $o)
    {
        $this->addObservers($o);
        return $this;
    }

    public function getObservers()
    {
        return $this->observers;
    }

    public function notify()
    {
        foreach ($this->observers as $value)
        {
            $value->update($this);
        }
    }



}