<?php
namespace proof\webapp;
/**
 * timestamp Jul 28, 2012 11:38:00 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp;
 *
 * Event indicating that a new controller was created and needs attention.
 *
 */
use proof\util\AbstractEvent,    proof\util\Aggregate;

class Fork extends AbstractEvent
{

    /**
     * The controller that has been created.
     * @var Controller $child
     * @access private
     */
    private $child;

    /**
     * Optional arguments to be passed into the child when executed.
     * @var Aggregate $args
     * @access private
     */
    private $args;

    public function __construct($parent, Controller $child, Aggregate $args = NULL)
    {

        $this->child = $child;

        $this->args = $args;

        parent::__construct($parent);

    }

    /**
     * Returns the child controller
     * @return Controller The child controller
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Returns the arguments passed with the new controller
     * @return Aggregate|NULL The arguments passed.
     */
    public function getArgs()
    {
        return $this->args;
    }

}