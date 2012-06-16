<?php

/**
 * timestamp May 19, 2012 7:03:40 PM
 *
 *
 * @project roadtroll
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package roadtroll
 *
 *  Wrapper class for strings.
 *
 *
 */

namespace callow\kit;


class String
{

    /**
     * The value of the string.
     * @var String $value
     * @access private;
     */
    private $value;

    public function __construct($value)
    {
        $this->value = (string) $value;

    }

    /**
     * Subtracts the an integer $length from this string.
     * Returns 0 if they are equal, a negative value if $length
     * is longer or a positive value if $length is shorter.
     * @param int $length
     * @return int
     */
    public function compareLength($length)
    {
        $local = $this->getLength();

        return $local - $length;

    }

    /**
     * Determines if the string is alphanumeric.
     * @return boolean
     */
    public function isAlphaNumeric()
    {

        return TRUE; //@TODO this^$this->matchesRegex('/[^a-z_\-0-9]/i');

    }

    /**
     * Performs a regex match on the string based on $expression
     * @param String $expression
     * @return boolean
     */
    public function matchesRegex($expression)
    {
        return preg_match($expression, $this->value);
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
     * Returns the current value of this String.
     * @return String
     */
    public function getValue()
    {

        return $this->value;

    }

    public function equals($string)
    {
        if($this->value === $string)
            return TRUE;

        return FALSE;
    }

}

?>
