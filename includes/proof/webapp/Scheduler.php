<?php

namespace proof\webapp;

/**
 * timestamp Jul 28, 2012 11:22:54 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Class that executes the controllers of a web app.
 *
 */
use proof\util\Stack,
    proof\util\EventListener,
    proof\util\Event,
    proof\util\Aggregate,
    proof\util\EventSource,
    proof\util\ArrayList,
    proof\util\Map;

use proof\hwk\Page;

final class Scheduler implements IScheduler, EventListener
{

    /**
     * Stack for data.
     * @var proof\util\Stack $dstack
     * @access protected
     */
    private $dstack;

    /** public function
     * Stack for controllers
     * @var proof\util\Stack
     * @access protected
     */
    private $cstack;

    final public function __construct()
    {

        $this->dstack = new Stack();
        $this->cstack = new Stack();

    }

    /**
     *  Executes controllers from an internal stack.
     */
    public function run(Page $page, ArrayList $get, Map $post)
    {

        while (!$this->cstack->isEmpty())
        {

            $data = NULL;

            if (!$this->dstack->size() > 1)
                $data = $this->dstack;


            $next_controller = $this->cstack->pop();

            if ($next_controller instanceof EventSource)
                $next_controller->register($this);

            $next_controller->main($page, $get, $post, $data);
        }

    }

    /**
     * Places a controller and optionally its args, onto the respective stacks.
     * @param \proof\webapp\Controller $ctl
     * @param \proof\webapp\Aggregate $args
     * @return \proof\webapp\Scheduler
     *
     */
    public function schedule(Controller $ctl, Aggregate $opts = NULL)
    {

        $this->cstack->push($ctl);

        $this->dstack->push($opts);

        return $this;

    }

    public function notify(Event $evt)
    {

        if ($evt instanceof Fork)
            $this->schedule($evt->getChild(), $evt->getArgs());

    }

}