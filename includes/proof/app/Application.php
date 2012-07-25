<?php
namespace proof\app;
/**
 * timestamp Jul 23, 2012 5:36:53 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\app
 *
 *  Interface for the main controlling class of a web application
 *
 */
interface Application
{

    /**
     * Contains code needed to initilize the application.
     */
    public function init();

    /**
     * Contains the logic of the application.
     */
    public function start();

    /**
     * Contains logic for finishing cleaning up after the application.
     */
    public function finish();

    /**
     * Launches the application.
     *
     */


}