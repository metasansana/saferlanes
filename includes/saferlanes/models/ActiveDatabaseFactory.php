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

class ActiveDatabaseFactory
{

    final public static function getDatabase()
    {
        $creds['dsn'] = 'saferlanes';
        $creds['usr'] = DB_USER;
        $creds['passwd'] = DB_PASSWORD;

        $config = new PDOBuilder ($creds);

        return new ActiveDatabase($config);
    }
}

?>
