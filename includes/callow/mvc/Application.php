<?php

/**
 * timestamp May 2, 2012 4:42:48 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mvc
 *
 *  Class that represents the currently running script.
 *
 */

namespace callow\mvc;

class Application
{

    /**
     * Stores the internal ControllerFactory
     * @var ControllerFactory $cfactory
     * @access private
     */
    private $cfactory;

    /**
     * Stores the path to a script that will be included before the controllers are called in
     * @var string $preboot
     * @access private
     */
    private $startup;

    /**
     * Stores the path to a script that will be included just before the script runs.
     * @var string $postboot
     * @access private
     */
    private $runtime;

    /**
     * Stores the path to a script that will be included just before the script exits.
     * @var string $postboot
     * @access private
     */
    private $exit;


    /**
     *
     * @param string $path
     * @param string $order
     * @return boolean
     */
    private function _bootable($path, $order)
    {


        if (is_string($path))
        {

            $fullpath = str_replace('.:', NULL, get_include_path()."/".$path);

            if (file_exists($path))
            {

                $this->$order = $path;

                return TRUE;

            }
            elseif(file_exists($fullpath))
            {
                $this->$order = $path;
            }
        }
        else
        {
            return FALSE;
        }


    }

    /**
     * Sets the path of a script that is used to boot strap the script.
     * @param string $path
     * @return boolean
     */
    public function setStartUpScript($path)
    {

        return $this->_bootable($path, 'startup');

    }


    /**
     * Sets the path of a script that will be run before the controllers are called.
     * @param string $path
     * @return boolean
     */
    public function setRuntimeScript($path)
    {

        return $this->_bootable($path, 'runtime');

    }

    /**
     * Sets the path to a script that will be run before the script terminates.
     * @param string $path
     * @return boolean
     */
    public function setExitScript($path)
    {

        return $this->_bootable($path, 'exit');

    }
        

    /**
     * Starts execution of the script.
     * @return void
     */
    public function run()
    {

        //Should set the class loader, perform checks etc.
        if ($this->startup)
            include_once "$this->startup";

        $params = Parameters::getParams();

        $controllers = new ControllerFactory();

        /*Should run any setup actions*/
        if ($this->runtime)
            include_once "$this->runtime";

        $controllers->getController($params)->main();

        /*Should run any clean up and reporting actions*/
        if ($this->exit)
            include_once "$this->exit";

    }

}

?>
