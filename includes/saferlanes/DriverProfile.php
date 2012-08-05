<?php
namespace saferlanes;
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


use proof\webapp\Widget;
use proof\util\Map;


class DriverProfile extends Widget
{

    private $driver;






    public function __construct(Driver $driver)
    {

        $this->driver = $driver;
        $this->content = new Map;

    }

   private function _setPlate()
   {

       $this->content->add('plate', strtoupper($this->driver->getPlate()));

   }

   private function _setTimeStamp()
   {
       $date = $this->driver->getTimeStamp();
       $this->content->add('timestamp', $date->format('g:ia \o\n l jS F Y'));
   }

   private function _setKarma()
   {
       $this->content->add('likes', $this->driver->getLikes());
       $this->content->add('fails', $this->driver->getFails());
   }

    private  function _setImage()
    {

        $likes =  $this->driver->getLikes();

        $fails  = $this->driver->getFails();

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

        $this->content->add('image', $image);

    }

    public function getContent()
    {
        $this->_setPlate();
        $this->_setTimeStamp();
        $this->_setKarma();
        $this->_setImage();

        return $this->content;

    }



}