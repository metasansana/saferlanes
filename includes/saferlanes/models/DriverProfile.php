<?php

/**
 * timestamp Jul 10, 2012 8:47:46 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */
namespace saferlanes\models;

use callow\app\AbstractBrowserUpdater;
use callow\app\BrowserUpdate;
use callow\util\Collection;
use saferlanes\core\Driver;


class DriverProfile extends AbstractBrowserUpdater
{

    protected $driver;

    protected $changes;


    public function __construct(Driver &$driver)
    {
        $this->driver = $driver;
        $this->changes = new Collection();
    }

    public function create()
    {

        $this->changes->add('image', $this->getImage());

        $this->changes->add('timestamp', $this->getTimeStamp());

        $this->changes->add('plate', $this->getPlate());

        $this->changes->add('likes', $this->driver->getPlus());

        $this->changes->add('fails', $this->driver->getMinus());

        $update = new BrowserUpdate($this, $this->changes);

        $this->notify($update);

        return $this;

    }

    protected function getPlate()
    {
        return strtoupper($this->driver->getPlate());
    }

    protected function getTimeStamp()
    {
         $date = getdate($this->driver->getTimeStamp());

        $date = "{$date['mday']} {$date['month']} {$date['year']}";

        return $date;

    }


    protected function getImage($label = 'image')
    {

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

        return $image;

    }


}

?>
