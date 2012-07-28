<?php

namespace proof\app;

/**
 * timestamp May 5, 2012 9:00:02 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\app
 *
 * Controller is the interface for executing a use case of an application.
 *
 *
 */
use proof\util\AbstractEventSource, proof\util\Aggregate;

interface Controller extends \proof\util\EventSource
{

    public function main(Aggregate $opts = NULL);

    public function setScheduler(Scheduler $s);

}