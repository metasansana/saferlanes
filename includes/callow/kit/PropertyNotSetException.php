<?php

/**
 * timestamp May 8, 2012 3:54:59 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\kit
 *
 *  Thrown when a DynamicContainer's is queried for a property
 *   that is not yet set.
 *
 */

namespace callow\kit;

class PropertyNotSetException extends \Exception
{

    /**
     * The name of the property not found.
     * @var string $property_name
     * @access private
     */
    private $property_name;

    /**
     * Constructor
     * @param string $property_name
     */
    public function __construct($property_name)
    {

        $this->property_name = $property_name;


    }

    /**
     * Returns the name of the property not found.
     * @return string
     */
    public function getPropertyName()

    {

        return $this->property_name;


}

}

?>
