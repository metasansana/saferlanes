<?php

/**
 * timestamp Jul 7, 2012 11:14:00 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 *
 *
 *
 */

namespace saferlanes\models;

use callow\app\AbstractBrowserUpdater;
use callow\app\BrowserUpdate;
use saferlanes\core\Driver;
use saferlanes\core\BadPlateNumberException;
use saferlanes\views\MessageBox;



class DriverGenerator extends AbstractBrowserUpdater
{

    /**
     * Internal Driver implementing object
     * @var Driver $driver
     * @access private
     */
    private $driver;


    public function __construct()
    {

        $this->driver = new Driver();



    }

    public function isValid($plate)
    {

        try
        {

        $this->driver->setPlate($plate);

        }
        catch(BadPlateNumberException $bex)
        {

            $reply = new BrowserUpdate($this);

            $reply->change('msg', new MessageBox($bex, 'error'));

            $this->notify($reply);

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
