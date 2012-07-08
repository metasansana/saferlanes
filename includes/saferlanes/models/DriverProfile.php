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

    private function getProfileDate()
    {
        $date = getdate($this->driver->getTimeStamp());

        $date = "{$date['mday']} {$date['month']} {$date['year']}";

        return $date;

    }

    private function getProfilePlate()
    {

        return strtoupper($this->driver->getPlate());

    }

    public  function displayRequestedDriver()
    {

        $this->win->insertHTML('plate', $this->getProfilePlate());

        $this->win->insertHTML('timestamp', $this->getProfileDate());

        $likes =  $this->driver->getPlus();

        $fails  = $this->driver->getMinus();

        if($likes > $fails)
        {
            $image = "happy";
        }
        elseif ($likes == $fails)
        {
            $image = "unsure";
        }
        else
        {
            $image = "sad";
        }

        $this->win->insertHTML('likes', $likes);

        $this->win->insertHTML('fails', $fails);

        $this->win->insertHTML('image', $image);

        $this->win->selectTemplate('display');

        return $this;


    }

}

?>
