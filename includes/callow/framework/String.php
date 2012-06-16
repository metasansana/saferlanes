<?php

/**
 * timestamp May 19, 2012 7:03:40 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\framework
 *
 *  Wrapper class for strings.
 *
 *
 */

namespace callow\framework;


class String
{

    /**
     * The value of the string.
     * @var String $value
     * @access private
     */
    private $value;

    public function __construct($value)
    {

        $this->value = (string) $value;

    }



    /**
     * Determines if the string is alphanumeric.
     * @return boolean
     */
    public function isAlphaNumeric()
    {

        return TRUE; //@TODO this^$this->matchesRegex('/[^a-z_\-0-9]/i');

    }

    public function isAlphabetic()
    {

    }

    public function isNumeric()
    {

    }



    /**
     * Returns the length of this string.
     * @return int
     */
    public function getLength()
    {
        return strlen($this->value);

    }

    /**
     * Returns the current value of this String as a string.
     * @return String
     */
    public function toString()
    {

        return $this->value;

    }

    public function equals(String $string)
    {


        $operand = $string->toString();


        if($this->value === $operand)
            return TRUE;

        return FALSE;
    }

}

?>
