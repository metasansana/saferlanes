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

namespace callow\dbase;

class PreparedArray
{

    /**
     *
     * @var array $unformated
     * @access private
     * The array to be formated.
     */
    private $unformated;

    public function __construct(array $unformated)
    {
    $this->unformated = $unformated;
    }

    /**
     * Returns an array formated to use in PreparedStatments
     * @return array
     */
    public function getFormatedArray()
    {




        foreach ($this->unformated as $key=> &$value)
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
