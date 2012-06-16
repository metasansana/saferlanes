<?php

/**
 * timestamp May 12, 2012 9:56:59 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\kit
 *
 * Parent class of all callow containers that allow new data keys
 * to be added at run time.
 *
 */

namespace callow\kit;

abstract class DynamicContainer extends Container
{

    /**
     * The internal list.
     * @var array $data
     * @access protected
     */
    protected $list = array ();

        /**
     * Checks the internal data for the existance of a particular key.
     * @param string $key
     * @return boolean
     */
    public function hasKey($key)
    {
        if (@array_key_exists($key, $this->list))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }


    /**
     * Sets the value of a key.
     * @param string $key
     * @param mixed $value
     * @return \callow\data\DataContainer
     */
    public function set($key, $value)
    {

        $this->list[$key] = $value;
        return $this;

    }

    /**
     * Sets all the values of DataContainer::data at once.
     * @param array $all
     * @return \callow\data\DataContainer
     */
    public function setAll(array &$all)
    {
        $this->list = $all;
        return $this;
    }

    /**
     * Returns the current value of a key
     * @param string $key
     * @return mixed|boolean
     */
    public function get($key)
    {

        if ($this->hasKey($key))
        {
            return $this->list[$key];
        }
        else
        {
            //throw new PropertyNotSetException($key);
            return NULL;
        }

    }


    /**
     * Returns an array representation of the internal data.
     * @return array
     */
    public function toArray()
    {
        return $this->list;

    }

}

?>
