<?php

/**
 * timestamp Jul 7, 2012 11:14:00 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 * This class wraps the validation process to make it reusable.
 *
 *
 */

namespace saferlanes\models;

use callow\event\Observer;
use saferlanes\core\DriverObject;
use saferlanes\core\Driver;
use saferlanes\core\InvalidPlateNumberError;


class DriverCheck extends AbstractObservableModel
{

    /**
     * Internal Driver implementing object
     * @var DriverObject $driver
     * @access private
     */
    private $driver;


    public function __construct(Driver &$driver = NULL, Observer $w = NULL)
    {
        if(!$driver)
            $driver = new DriverObject();

        $this->driver = $driver;

        parent::__construct($w);
    }

    public function assignPlateNumber($pnum)
    {

        try
        {
        $this->driver->setPlate($pnum);
        }
        catch(InvalidPlateNumberError $inv)
        {

            $this->fire(new CheckFailure($inv));

            return FALSE;
        }

        return TRUE;


    }

    public function getDriver()
    {
        return $this->driver;
    }


}


?>
