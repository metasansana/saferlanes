<?php
namespace proof\sql;
/**
 * timestamp Aug 2, 2012 8:04:42 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Basic provider of PDO objects. This class does nothing but store an return a PDO object.
 * Its is meant to be used as the base for configuring pdo object attributes.
 * @example
 *
 *   $provider = new SilentPDOProvider (new TextPDOProvider (new BasePDOProvider($dsn))))
 *
 */
class BasePDOProvider implements PDOProvider
{

    /**
     * The internally stored PDO object
     * @var \PDO $pdo
     * @access
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {

        $this->pdo = $pdo;

    }


    /**
     * Returns the previously stored pdo object.
     * @return \PDO $pdo
     */
    public function getPDO()
    {

        return $this->pdo;

    }
}