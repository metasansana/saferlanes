<?php
namespace proof\webapp;
/**
 * timestamp Jul 28, 2012 10:56:39 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for executing controllers.
 *
 */
use proof\util\Aggregate;

interface IExecutor
{

    public function execute();

    public function put(Controller $ctl, Aggregate $args = NULL);

}