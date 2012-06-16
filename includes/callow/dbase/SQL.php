<?php

/**
 * timestamp May 29, 2012 11:15:50 PM
 *
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\dbase
 *
 *  Class that represents an SQL statement.
 *
 */

namespace callow\dbase;

class SQL
{

    /**
     * A string of SQL code.
     * @var string code
     * @access private
     */
    private $code;


    public function __construct($code)
    {
        if(is_string($code))
        {
            $this->code = $code;
        }
        else
        {
            throw new \InvalidArgumentException;
        }

    }

    public function toString()
    {
        return $this->code;
    }

}

?>
