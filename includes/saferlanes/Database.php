<?php

namespace saferlanes;


/**
 * timestamp Aug 4, 2012 8:54:36 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *  Provides PDO provider objects.
 *
 */
use proof\sql\BasePDOProvider;
use proof\sql\SilentPDOProvider;

class Database
{

    private $pdo;

    private $dsn;

    private $user;

    private $passwd;

    public function __construct($dsn, $user, $passwd)
    {
        $this->dsn =$dsn;
        $this->user =$user;
        $this->passwd = $passwd;

    }

    public function connect()
    {

        try
        {
            $this->pdo = new \PDO($this->dsn, $this->user, $this->passwd);
            $flag = TRUE;
        }
        catch (\PDOException $exc)
        {
            $flag  = FALSE;
        }

        return $flag;

    }

    public function getConnection()
    {

        return $this->pdo;


    }

}