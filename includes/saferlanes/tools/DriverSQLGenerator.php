<?php

/**
 * timestamp May 30, 2012 9:21:25 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\tools
 *
 *
 */

namespace saferlanes\tools;

use callow\dbase\SQL;

class DriverSQLGenerator
{


    public function getSaveCode()
    {
        $sql = "INSERT INTO driver (`plate`, `timestamp`) VALUES (:plate, :timestamp)";
        return new SQL($sql);
    }

    public function getLoadCode()
    {
        $sql = "SELECT `plate`, `timestamp`, `plus`, `minus` FROM driver WHERE plate=:plate";
        return new SQL($sql);
    }

    public function  getUpdateCode()
    {
        $sql = "UPDATE driver SET plus = plus+1 WHERE  plate = :plate";
        return new SQL($sql);
    }

}

?>
