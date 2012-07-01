<?php

/**
 * timestamp Jun 29, 2012 10:11:05 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 *  Model class that attempts to extracts a driver form the database.
 *
 */

namespace saferlanes\models;

use callow\dbase\SQL;
use callow\dbase\ActiveDatabase;
use callow\dbase\DatabaseMapper;
use saferlanes\core\DriverInterface;

class DriverExtractor
{

    public function extract(DriverInterface &$driver, SQL &$sql, ActiveDatabase &$dbase)
    {


        $mapper = new DatabaseMapper($driver, $sql, $dbase);

        $mapper->load();

        return $driver;

    }
}


?>
