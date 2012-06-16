<?php

/**
 * timestamp May 2, 2012 5:08:35 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mvc
 *
 *  Class that generates a controller class based on configurable trigger table
 *  information.
 *
 */

namespace callow\mvc;


class ControllerFactory
{

    /**
     * Contains a table that maps a specific action to a controller. These
     * are called triggers.
     * @var array $table
     */
    private $table = array ();

    /**
     * The name of the called controller if no match is made.
     * @var string $index
     */
    private $index;

    /**
     * Called when there are no matching triggers.
     *  Example: example.com/users
     * @var string $default
     */
    private $default;

    /**
     * Adds a controller name to the controller table.
     * NOTICE: This method will overwrite any controllers that have the same trigger!
     * @param string $trigger
     * @param string $class_name
     * @return \callow\mvc\ControllerFactory
     */
    public function addController($trigger, $class_name)
    {

        $this->table[$trigger] = $class_name;
        return $this;

    }

    /**
     * Replaces the controller table with $table.
     * @param array $table
     * @return \callow\mvc\ControllerFactory
     */
    public function setControllerTable(array $table)
    {

        $this->table = $table;
        return $this;

    }

        /**
     * Sets the name of the class to be used as the index controller
     * @param type $class_name
     * @return \roadtroll\models\ControllerFactory
     */
    public function setIndex($class_name)
    {

        $this->index = $class_name;
        return $this;

    }

    /**
     * Sets the name of the class to be used as the default controller
     * @param type $class_name
     * @return \roadtroll\models\ControllerFactory
     */
    public function setDefaultController($class_name)
    {

        $this->default = $class_name;
        return $this;

    }

    /**
     * Returns a controller class.
     * @param string $trigger
     * @return \callow\mvc\ControllerFactory
     *
     */
    public function getController($args=NULL)
    {

        if(count($args)> 0)
        {
            if(array_key_exists($args[0], $this->table))
            {
                $class = $this->table[$args[0]];
                array_shift($args);
            }
            else
            {
              $class = $this->default;
            }

        }
        else
        {
            $class = $this->index;
        }



        $Controller = new $class ($args);



        return $Controller;

    }

}

?>
