<?php

/**
 * timestamp May 5, 2012 9:00:02 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mvc
 *
 * Parent class for all controller classes.
 * In the callow package, controllers are responsible for the conditional
 * flow of the program. Models are the various classes of the program that
 * do actual work.
 *
 */

namespace callow\mvc;

abstract class Controller
{

    /**
     * Contains arguments passed to the controller..
     * @var array params;
     */
    protected $params = array(); //@todo this should be a collection


    public function __construct(array $params = NULL)
    {
        if($params)
            $this->params = $params;
    }


    /**
     * The main method of the controller class.
     */
    abstract public function main ();


}

?>
