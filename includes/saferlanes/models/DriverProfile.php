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

use saferlanes\core\Driver;

class DriverProfile
{

    protected $driver;

    protected $page;


    public function __construct(WebPage &$page, Driver &$driver)
    {
        $this->page = $page;
        $this->driver = $driver;
    }

    public function create()
    {
        $this->putImage();
        $this->putTimeStamp();
        $this->putPlate();
        $this->page->set('likes', $this->driver->getPlus());
        $this->page->set('fails', $this->driver->getMinus());

        return $this;

    }

    protected function putPlate($label='plate')
    {
        $this->page->set($label, strtoupper($this->driver->getPlate()));
        return $this;
    }

    protected function putTimeStamp($label = 'timestamp')
    {
         $date = getdate($this->driver->getTimeStamp());

        $date = "{$date['mday']} {$date['month']} {$date['year']}";

        $this->page->set($label, $date);

    }


    protected function putImage($label = 'image')
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

        $this->page->set($label, $image);


        return $image;

    }


}

?>
