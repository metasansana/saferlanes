<?php

/**
 * timestamp May 19, 2012 6:34:41 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\kit
 *
 *  Wrapper class for intergers.
 *
 *
 *
 */

namespace callow\kit;

class Integer
{



    /**
     * The value of the integer
     * @var int value
     * @access private;
     */
    private $value;

    public function __construct($value)
    {
        $this->value = (int)$value;
    }

    /**
     * Subtracts the  Integer $int from this one. Returns 0 if there is no difference, a negative value if $int is more
     * and a positive value if $int is less.
     * @param int $int
     * @return int
     */
    public function compareTo ($int)
    {

        $local = $this->getValue();

        $passed = $int->getPropertyValue();

        return $local - $passed;
    }

    /**
     * Returns the current value of this Integer
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns a string representation of the current Integer.
     * @return string
     */
    public function toString()
    {
        return (string)$this->getValue();
    }


    public function __toString()
    {
        return $this->toString();
    }

}

?>
