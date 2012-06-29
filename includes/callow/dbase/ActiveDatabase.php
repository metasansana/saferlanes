<?php

/**
 * timestamp May 21, 2012 8:17:42 PM
 *
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\sql\dbase
 *
 *  This clas captures the interface for querying PDO objects.
 *
 */

namespace callow\dbase;


class ActiveDatabase
{

    /**
     * Internally used PDO object.
     * @var PDO $pdo
     * @access protected
     */
    private $pdo;


    public function __construct(PDOBuilder  &$config)
    {

        $this->pdo = $config->getPDO();

    }

    /**
     * Starts transaction mode.
     * @return \callow\sql\Connection
     */
    public function begin()
    {

        $this->pdo->beginTransaction();
        return $this;

    }

    /**
     * Prepares a statement for execution. Statements of this kind cannot be used to retrive data.
     * @param string $sql
     * @return \callow\sql\dbase\PreparedStatement
     */
    public function prepareStatement($sql)
    {

        $stmt = new PreparedStatement($this->pdo->prepare($sql));

        return $stmt;

    }

    public function prepareQuery($sql)
    {



}

/**
 * Cancels an existing transaction.
 * @return boolean
 */
    public function cancel()
    {
        return $this->pdo->rollBack();

    }

    /**
     * Attempts to commit changes to the database.
     * @return boolean
     */
    public function finish()
    {
        return $this->pdo->commit();
    }


}

?>
