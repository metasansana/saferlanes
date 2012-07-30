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
     * @var proof\util\Aggregate $listeners
     * @access protected
     */
    protected $listeners;


    /**
     *  Clears and returns the listeners of this class.
     * @return proof\util\Aggregate   The previous list of listeners.
     */
    public function flush()
    {

        $listeners = $this->listeners;

        $this->listeners->clear();

        return $listeners;

    }

    /**
     *  Returns the listeners of this class
     * @return proof\util\Aggregate
     */
    public function getListeners()
    {
        return $this->listeners;
    }


}