<?php
namespace proof\webapp;

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
use proof\util\Aggregate;

interface Controller
{

    public function main(Aggregate $opts = NULL);


}