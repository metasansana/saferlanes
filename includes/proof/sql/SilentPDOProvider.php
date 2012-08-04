<?php
namespace proof\sql;
/**
 * timestamp Aug 2, 2012 8:20:24 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Provides a PDO object with warnings and exceptions turned off.
 *
 */
use \PDO;

class SilentPDOProvider extends AbstractPDOProviderWrapper
{


    /**
     *  Returns a pdo object with error reporting switched off.
     * @return \PDO
     */
    public function getPDO()
    {

        $pdo = $this->provider->getPDO();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        return $pdo;

    }
}