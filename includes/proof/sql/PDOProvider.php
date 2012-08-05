<?php
namespace proof\sql;

/**
 * timestamp Aug 2, 2012 8:03:14 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\pdo
 *
 * Interface for providing pdo objects
 *
 */
interface PDOProvider
{

    /**
     * @return \PDO  A PDO object.
     */
    public function getPDO();

}