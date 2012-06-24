<?php

/**
 * timestamp May 19, 2012 7:03:40 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\framework
 *
 *  Wrapper class for creating string objects.
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
    protected $value;

    public function __construct($value = NULL)
    {

        if ($value)
            $this->value = (string) $value;

    }

    /**
     * Appends a string value to the end of this string.
     * @return String
     */
    public function append($value)
    {
        $this->value .= (string) $value;
        return $this;
    }

    /**
     * Determines whether to String objects are equal in value.
     * @param String $string
     *
     * @internal This method may be replaced with a compare type method. The reason being that a numeric
     *                   comparisson is more flexible.
     *
     * @return boolean
     */
    public function equals(String $string)
    {

        $operand = $string->toString();

        if ($this->value === $operand)
            return TRUE;

        return FALSE;

    }


    /**
     * Prepends a string value to this string.
     * @param string $value
     * @return String
     */
    public function prepend($value)
    {
        $this->value .= $this->value .= (string) $value;
        return $this;
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

    public function __toString()
    {
        return $this->toString();
    }

}

?>
