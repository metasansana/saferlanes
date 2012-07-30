<?php
namespace proof\util;
/**
 * timestamp Jul 29, 2012 10:00:47 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Class for dispatching events.
 *
 *
 */
abstract class AbstractDispatcher implements Dispatcher
{

    /**
     * List of listeners
     * @var proof\util\ArrayList $listeners
     * @access protected
     */
    protected $listeners;

    public function __construct()
    {
        $this->listeners = new ArrayList;
    }

    /**
     *  Binds a listener to the dispatcher
     * @param \proof\util\EventListener $l
     * @return \proof\util\AbstractDispatcher
     */
    public function bind(EventListener $l)
    {

        $this->listeners->add($l);

        return $this;

    }


    /**
     *  Clears and returns the listeners of this class.
     * @return proof\util\ArrayList   The previous list of listeners.
     */
    public function flush()
    {

        $listeners = $this->listeners;

        $this->listeners->clear();

        return $listeners;

    }

    /**
     *  Returns the listeners of this class
     * @return proof\util\ArrayList
     */
    public function getListeners()
    {
        return $this->listeners;
    }


}