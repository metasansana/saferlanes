<?php

/**
 * timestamp May 8, 2012 3:49:34 AM
 *
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\kit
 *
 * Parent class of all callow containers that limit data keys to the
 * property names of the class.
 *
 *
 *
 */

namespace callow\kit;

abstract class DelimitedContainer extends Container
{

    public function hasKey($key)
    {
        if(property_exists($this, $key))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function toArray()
    {


        $array = array ();


        foreach ($this as $property => &$value)
        {
            $array[$property] = $value;
        }

        return $array;

    }


    public function set($key, $value)
    {

        if(!$this->hasKey($key))
               throw new PropertyNotFoundException($key);

        $this->$key = $value;

        return $this;



    }

    /**
     * Allows multiple propertes to be set at once
     * @param array $all
     * @return \callow\data\DataObject
     */
    public function setAll(array &$all)

    {

        foreach ($all as $key => &$value)
        {
            if($this->hasKey ($key))
                $this->set ($key, $value);
        }

        return $this;


}

    /**
     *Returns the current value of a property called $key
     * @param string $key
     * @return mixed
     * @throws PropertyNotFoundException
     */
    public function get($key)
    {

         if(!property_exists($this, $key))
               return NULL;

         return $this->$key;

    }



}

?>
