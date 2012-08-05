<?php
namespace proof\webapp;
/**
 * timestamp Jul 31, 2012 5:49:06 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Class representing a typical web application. Proof main classes extend this class
 *  and use its three abstract methods as follows:
 *  init()        Initialization of the app.
 *  start()     Starts the business logic of the app
 *  finish()    Cleans up after the start method
 *
 * The these three methods are called in sequence via the execute() method.
 *
 */
abstract class Application
{

    abstract public function init();

    abstract public function start();

    abstract public function finish();

    public function run()
    {
        $this->init()->start()->finish();
    }



}