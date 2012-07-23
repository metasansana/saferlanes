<?php

namespace proof\types;


/**
 * timestamp Jul 23, 2012 5:08:47 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\types
 *
 *  Parent class of all proof primitive type classes. Type classes are used to 'fake' stable
 *  typing in the PHP language.
 *
 */
class Type
{

    /**
     * The current value of this type
     * @var mixed $value
     * @access protected
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;

    }

    public function __toString()
    {
        return (string)$this->value;

    }

}
