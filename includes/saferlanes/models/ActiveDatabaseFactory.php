<?php

/**
 * timestamp May 30, 2012 6:14:18 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\tools
 *
 *
 */

namespace saferlanes\models;

use callow\dbase\ActiveDatabase;
use callow\dbase\PDOBuilder;
use callow\util\AbstractAlerter;
use callow\util\Panic;



class ActiveDatabaseFactory
{




    final public function getActiveDatabase()
    {

        $instance = NULL;

        $creds['dsn'] = DB_DSN;
        $creds['usr'] = DB_USER;
        $creds['passwd'] =  DB_PASSWORD;

        try
        {

        $config = new PDOBuilder ($creds);

        $instance = new ActiveDatabase($config);

        }
        catch(\PDOException $pexc)
        {

            $panic = new Panic($this, AlertCodes::DB_UNREACHABLE, $pexc);


            $this->notify($panic);

        }

        return $instance;


    }
}

?>
