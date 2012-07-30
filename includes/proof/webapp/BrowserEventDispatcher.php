<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 4:27:30 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Dispatcher class for browser events.
 *
 *
 */
use proof\util\AbstractDispatcher;

class BrowserEventDispatcher extends AbstractDispatcher implements IBrowserEventDispatcher
{

    public function bind(BrowserEventListener $l)
    {
        parent::bind($l);

        return $this;
    }

    public function notifyOnLocationChanged(LocationChangedEvent $e)
    {

        foreach ($this->listeners as $l)
        {

            $l->onLocationChanged($e);
        }

    }

    public function notifyOnHttpPost(HttpPostEvent $e)
    {

        foreach ($this->listeners as $l)
        {
            $l->onPost($e);
        }

    }
}