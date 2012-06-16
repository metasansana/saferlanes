<?php

/**
 * timestamp May 23, 2012 5:21:54 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\sql\dbase
 *
 * Use this class to make the Domain's toArray() method compliant with \PDOStatement:execute(array) requirements.
 */

namespace callow\database;

use callow\domain\Domain;

class DomainAdapter
{

    /**
     *
     * @var Domain $dmain
     * @access private
     * The Domain being adapted.
     */
    private $dmain;

    public function __construct(Domain &$dmain)
    {
    $this->dmain = $dmain;
    }

    /**
     * Returns a key modified array version of the Domain
     * @return array
     */
    public function toArray()
    {

        $array = $this->dmain->toArray();


        foreach ($array as $key=> &$value)
        {
            if(isset($value))
            {
            $nkey = ":$key";
            $narray[$nkey] = $value;
            }
        }

        return $narray;
    }




}

?>
