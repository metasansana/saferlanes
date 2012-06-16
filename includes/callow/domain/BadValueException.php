<?php

/**
 * timestamp May 30, 2012 12:49:14 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\domain
 *
 *
 */

namespace callow\domain;


class BadValueException extends \Exception
{

    private $property;
    private $value;


    public function __construct($property, $value, $message)
    {

        $this->property = $property;
        $this->value = $value;
        $this->message = $message;

    }


    public function getPropertyValue()
    {
        return $this->value;

    }

    public function getPropertyName()
    {
        return $this->property;

    }

}

?>
