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

use callow\event\AbstractObservable;
use saferlanes\core\DriverObject;
use saferlanes\core\Driver;
use saferlanes\core\BadPlateNumberException;


class DriverValidator extends AbstractObservable
{

    /**
     * Internal Driver implementing object
     * @var Driver $driver
     * @access private
     */
    private $driver;


    public function __construct(Driver &$driver)
    {

        $this->driver = $driver;

    }

    public function assignPlateNumber($pnum)
    {

        try
        {
        $this->driver->setPlate($pnum);
        }
        catch(BadPlateNumberException $bex)
        {

            $this->fire(new Notice($bex, $this));

            return FALSE;
        }

        return TRUE;


    }


}


?>
