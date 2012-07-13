<?php

/**
 * timestamp Jul 10, 2012 4:16:30 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core
 *
 *
 */

namespace saferlanes\core;

use callow\domain\Domain;

class DriverPresenter
{

    /**
     *
     * @var Driver $driver
     * @access private
     */
    private $driver;

    public function __construct(Driver &$driver)
    {
        $this->set($driver->to);
    }


    private function getTimeStamp()
    {
        $date = getdate($this->driver->getTimeStamp());

        $date = "{$date['mday']} {$date['month']} {$date['year']}";

        return $date;

    }

    private function getPlate()
    {;

        return strtoupper($this->driver->getPlate());

    }

   public function getPlus()
   {
       return $this->driver->getPlus();
   }

   public function getMinus()
   {

       return $this->driver->getMinus();
   }



    public  function getImage()
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

   public function getPlusLink($token)
   {

       return "/vote/plus/{$this->driver->getPlate()}/$token";

   }

   public function getMinusLink($token)
   {

       return "/vote/minus/{$this->driver->getPlate()}/$token";

   }

}

?>
