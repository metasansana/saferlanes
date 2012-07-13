<?php

/**
 * timestamp May 29, 2012 9:28:53 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\domain
 *
 *  Abstract data domain object.
 *
 */

namespace callow\domain;


class Domain implements DomainInterface
{

    public function count()
    {
        return 1;
    }

    /**
     * Test to determine if a propery name is an attribute of  this class.
     * @param string $property
     * @return boolean
     */
    public function isProperty($property)
    {

        return property_exists($this, $property);

    }

    /**
     * Returns an array representation of this class.
     * @return array
     */
    public function __toArray()
    {

        $list = array ();
        $property = NULL;
        $value = NULL;

        foreach ($this as $property => &$value)
        {
            $list[$property] = $value;
        }

        return $list;

    }

    /**
     * Overwrites properties of this object.
     * @param array $list
     * @return \callow\domain\Domain
     */
      public function set(array $list)
    {
        foreach ($list as $property=>&$value)
        {

            if($this->isProperty($property))
                $this->$property = $value;
        }

        return $this;
    }


    /**
     * Returns the properties of this object that are set.
     * @return array
     */
    public function get()
    {

        $set = array();

        foreach($this as $property=>&$value)
        {
            if($value !== NULL)
                $set[$property] = $value;
        }

        return $set;

    }

}

?>
