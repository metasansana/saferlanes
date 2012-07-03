<?php

/**
 * timestamp Jun 29, 2012 10:11:05 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 *  Helper class for manipulating driver data.
 *
 */

namespace saferlanes\models;

use callow\dbase\SQL;
use callow\dbase\ActiveDatabase;
use callow\dbase\DatabaseMapper;
use saferlanes\core\Driver;

class SLEngine
{

    private $mapper;

    public function __construct(ActiveDatabase &$dbase)
    {
        $this->mapper = new DatabaseMapper($dbase);
    }

    public function find(Driver &$driver, SQL &$sql)
    {


        $this->mapper->setDomain($driver);

        $this->mapper->setSQL($sql);

        $this->mapper->load();

        return $driver;

    }
}


?>
