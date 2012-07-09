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

use saferlanes\core\Driver;
use saferlanes\core\InvalidPlateNumberError;


class DriverValidation
{

    /**
     * Internal Driver implementing object
     * @var DriverObject $driver
     * @access private
     */
    private $driver;

    /**
     * An array containing error messages.
     * @var array $errors
     * @access private
     */
    private $errors = array();

    public function __construct(Driver &$driver = NULL)
    {
        if(!$driver)
            $driver = new DriverObject();

        $this->driver = $driver;
    }

    public function assignPlateNumber($pnum)
    {

        try
        {
        $this->driver->setPlate($pnum);
        }
        catch(InvalidPlateNumberError $inv)
        {

            $this->errors['plate'] = (string) $inv;

            return FALSE;
        }

        return TRUE;


    }

    public function getErrorMessage($hint)
    {
        if(array_key_exists($hint, $this->errors))
                return $this->errors[$hint];

        return NULL;
    }

    public function getDriver()
    {
        return $this->driver;
    }


}


?>
