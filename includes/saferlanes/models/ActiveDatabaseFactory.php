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



class ActiveDatabaseFactory extends AbstractEventModel
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
        catch(\Exception $pexc)
        {

            $this->fire(new FatalEvent());

        }

        return $instance;


    }
}

?>
