<?php

/**
 * timestamp May 30, 2012 4:35:24 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  The GenericCollection class is the implementation of the Collection interface.
 *
 */

namespace callow\util;

use callow\util\Collection;

class GenericCollection implements Collection
{

    /**
     * @var array $collected
     * @access protected
     */
    protected $collected = array ();

    public function __construct(array &$items = NULL)
    {

        if ($items)
        {

            foreach ($items as $key => &$value)
            {
                $this->add($value, $key);
            }
        }

    }

    public function add($index, $item)
    {
        
        $this->collected[$index] = $item;

        return $this;

    }

    public function remove($index)
    {
        unset($this->collected[$index]);

        return $this;

    }

    public function copy(Collection $another_collection)
    {
        $this->collected = $another_collection->toArray();

    }

    public function getIterator()
    {

    }

    public function retrieve($index)
    {
        if (array_key_exists($index, $this->collected))
            return $this->collected[$index];

        throw new InvalidIndexException($index);

        return FALSE;

    }

    public function count()
    {
        return count($this->collected);

    }

    public function hasIndex($index)
    {
        return array_key_exists($index, $this->collected);

    }

    public function contains($index)
    {
        $result = isset($this->collected[$index]);

        return $result;

    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset))
        {
            $this->collected[] = $value;
        }
        else
        {
            $this->collected[$offset] = $value;
        }

    }

    public function offsetExists($offset)
    {
        return $this->isEmpty($offset);

    }

    public function offsetUnset($offset)
    {
        $this->remove($offset);

    }

    public function offsetGet($offset)
    {

        $result = NULL;

        try
        {
            $result = $this->retrieve($offset);
        }
        catch (\Exception $ex)
        {

        }

        return $result;

    }

    public function toArray()
    {
        return $this->collected;

    }

}

?>
