<?php

/**
 * timestamp Jul 8, 2012 9:19:17 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  Helper class used to format  a driver for displaying on screen.
 *
 */

namespace saferlanes\models;

use callow\app\AbstractWindow;
use saferlanes\core\DriverObject;


class DriverProfile extends AbstractWindowModel
{

    private $driver;



    public function __construct(AbstractWindow &$win, DriverObject &$driver)
    {

        $this->driver = $driver;

        parent::__construct($win);

    }

    public function getProfileDate()
    {
        $date = getdate($this->driver->getTimeStamp());

        $date = "{$date['mday']} {$date['month']} {$date['year']}";

        return $date;

    }

    public function getProfilePlate()
    {

        return strtoupper($this->driver->getPlate());

    }

}

?>
