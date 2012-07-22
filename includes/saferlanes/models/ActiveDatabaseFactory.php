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
use callow\util\Config;



class ActiveDatabaseFactory
{




    final public function getActiveDatabase()
    {

        $config = new Config(get_include_path()."/etc/saferlanes/sl.ini");

        $instance = NULL;

        $creds['dsn'] = $config->get("db_dsn");
        $creds['usr'] = $config->get('db_user');
        $creds['passwd'] =  $config->get('db_password');

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
