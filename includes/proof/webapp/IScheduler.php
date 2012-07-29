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
use proof\util\Aggregate, proof\util\ArrayList, proof\util\Map;
use proof\hwk\Page;

interface IScheduler
{

    public function run(Page $page, ArrayList $get, Map $post);

    public function schedule(Controller $ctl, Aggregate $opts = NULL);

}