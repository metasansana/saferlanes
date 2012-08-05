<?php
namespace proof\sql;
/**
 * timestamp Aug 2, 2012 8:12:56 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Provides a PDO object that returns values as strings.
 *
 */
use \PDO;

class TextModePDOProvider extends AbstractPDOProviderWrapper
{


    /**
     * Sets PDO::ATTR_ORACLE_NULLS to PDO::NULL_TO_STRING and
     * PDO::ATTR_STRINGIFY_FETCHES to true
     * @return \PDO
     */
    public function getPDO()
    {
        $pdo = $this->provider->getPDO();

        $pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);

        $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, TRUE);

        return $pdo;


    }
}