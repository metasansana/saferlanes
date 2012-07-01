<?php

/**
 * timestamp May 31, 2012 5:05:04 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core\domain;
 *
 *
 */

namespace saferlanes\core;


class StoredDriver extends AbstractDriver
{



    public function getPlate()
    {

        //@todo add a regex to insert space
        $plate = strtoupper(parent::getPlate());

        return $plate;


        }

    public function getTimeStamp()
    {

           $date = getdate(parent::getTimeStamp());

           $date = "{$date['mday']} {$date['month']} {$date['year']}";

           return $date;

    }


}

?>
