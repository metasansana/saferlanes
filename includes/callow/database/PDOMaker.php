<?php

/**
 * timestamp May 22, 2012 9:34:01 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\sql\dbase
 *
 *  This class provides an interface for configuring a PDO object prior to querying.
 *
 */

namespace callow\database;

class PDOMaker
{

    /**
     * Internal PDO object.
     * @var PDO $pdo
     * @access private
     */
    private $pdo;

    public function __construct(array $creds)
    {
        $this->pdo = new \PDO($creds['dsn'], $creds['usr'], $creds['passwd']);
    }

    /**
     * Calls the PDO::setAttribute() method
     * @param int $attr
     * @param mixed $value
     * @return boolean
     */

    public function setAttribute($attr, $value)
    {
        return $this->pdo->setAttribute($attr, $value);
    }

    /**
     * Returns the internal PDO object.
     * @return \PDO pdo
     */
    public function getPDO()
    {
        return $this->pdo;
    }



}

?>
