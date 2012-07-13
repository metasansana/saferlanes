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

    private $driver;

    private $page;

    public function __construct(WebPage &$page, Driver &$driver)
    {
        $this->page = $page;
        $this->driver = $driver;
    }


    public function create($token)
    {
        $this->putImage();
        $this->putMinusLink($token);
        $this->putPlusLink($token);
        $this->putTimeStamp();
        $this->putPlate();

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

    protected function putPlusLink($token, $label='plus_link')
    {
        $plus = "/vote/plus/{$this->driver->getPlate()}/$token";

        $this->page->set($label, $plus);

        return $this;


    }

    protected function putMinusLink($token, $label='minus_link')
    {

        $minus = "/vote/minus/{$this->driver->getPlate()}/$token";

        $this->page->set($label, $minus);

        return $this;
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
