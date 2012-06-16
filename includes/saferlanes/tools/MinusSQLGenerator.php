<?php

/**
 * timestamp May 31, 2012 10:06:55 PM
 *
 *
 * @project roadtroll
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\tools
 *
 *
 */
namespace saferlanes\tools;

use callow\dbase\SQL;

class MinusSQLGenerator extends DriverSQLGenerator
{


    public function  getUpdateCode()
    {
        $sql = "UPDATE driver SET minus = minus+1 WHERE  plate = :plate";
        return new SQL($sql);
    }
}

?>
