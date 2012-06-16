<?php

/**
 * timestamp May 21, 2012 10:00:47 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\sql\dbase;
 *
 *
 */

namespace callow\database;

use callow\kit\Container;

class PreparedStatement
{


    /**
     * Internal PDOStatement object
     * @var PDOStatement $stmt
     * @access private
     */
    private $stmt;

    public function __construct(\PDOStatement $stmt)
    {
        $this->stmt = $stmt;

    }


    public function execute(array &$params )
    {

        return $this->stmt->execute($params);
    }

    public function flush(Container &$obj)
    {

        $flag = FALSE;

         while($row = $this->stmt->fetch(\PDO::FETCH_ASSOC))
        {
             $obj->setAll($row);
             $flag = TRUE;
        }

        return $flag;

    }
}

?>
