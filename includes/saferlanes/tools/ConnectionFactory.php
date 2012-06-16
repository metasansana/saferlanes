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

namespace saferlanes\tools;

use callow\dbase\Connection;
use callow\dbase\ConnectionBuilder;

class ConnectionFactory
{

    final public static function getConnection()
    {
        $creds['dsn'] = 'saferlanes';
        $creds['usr'] = DB_USER;
        $creds['passwd'] = DB_PASSWORD;

        $config = new ConnectionBuilder ($creds);

        return new Connection($config);
    }
}

?>
