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
use proof\util\Stack,  proof\util\EventListener,  proof\util\Event,  proof\util\Aggregate;

class Executor implements IExecutor, EventListener
{

    /**
     * Stack for data.
     * @var proof\util\Stack $dstack
     * @access protected
     */
    private $dstack;

    /**public function
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
    public function execute()
    {

        while(!$this->cstack->isEmpty())
        {

            $data = NULL;

            if(!$this->dstack->isEmpty())
                $data = $this->dstack;

            $next_controller = $this->cstack->pop();

            $next_controller->main($data);

        }

    }

    /**
     * Places a controller and optionally its args, onto the respective stacks.
     * @param \proof\webapp\Controller $ctl
     * @param \proof\webapp\Aggregate $args
     * @return \proof\webapp\Executor
     *
     */
    public function put(Controller $ctl, Aggregate $args = NULL)
    {

        $this->cstack->push($ctl);

        if($args)
            $this->dstack->push ($args);

        return $this;

    }

    public function notify(Event $evt)
    {

        if( $evt instanceof Fork)
            $this->put($evt->getChild(), $evt->getArgs());

    }
}