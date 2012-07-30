<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 4:28:21 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for dispatching browser events.
 *
 */

interface IBrowserEventDispatcher
{

    public function notifyOnHttpPost(HttpPostEvent $e);

    public function notifyOnLocationChanged(LocationChangedEvent $e);


}