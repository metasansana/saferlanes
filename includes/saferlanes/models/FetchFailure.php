<?php

/**
 * timestamp Jul 7, 2012 11:24:48 PM
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

use callow\event\Event;

class FetchFailure extends Event
{

    private $plate_number;

    public function setPlateNumber($plate_number)
    {
        $this->plate_number =(string)$plate_number;
        return $this;
    }

    public function getPlateNumber()
    {
     return $this->plate_number;
    }

    public function __toString()
    {

        return "Sorry, but that plate is not in the database yet!";
    }


}

?>
