<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 5:28:31 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Parent class of all browser events.
 *
 */
use proof\util\AbstractEvent;
use proof\util\Aggregate;

abstract class BrowserRequestEvent extends AbstractEvent
{

    /**
     * Aggregate object representing the args of the request.
     * @var proof\util\Aggregate $args
     * @access  protected
     */
    protected $args;

    public function __constuct(Browser $browser, Aggregate $args)
    {

        $this->args = $args;
        parent::__construct($browser);

    }

}