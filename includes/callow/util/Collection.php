<?php

/**
 * timestamp May 30, 2012 4:35:24 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  A basic Collection class.
 *
 *  @todo There is still no distinction between numeric and string keys.
 *  @todo A call to remove messes up the key ordering of the internal array. A solution is needed.
 *  @todo Add iterator aggregrate
 *  @todo this class is messy and needs clean up
 */

namespace callow\util;

class Collection implements \ArrayAccess
{

    /**
     * @var array $collected
     * @access protected
     */
    protected $items = array ();

    public function __construct(array &$items = NULL)
    {

        if ($items)
        {

            foreach ($items as $key => &$value)
            {
                $this->add($key, $value);
            }
        }

    }

    public function add($index, $item)
    {

        $this->items[$index] = $item;

        return $this;

    }

    public function remove($index)
    {

        $removed = NULL;

        if($this->exists($index))
        {

        $removed = $this->items[$index];

        unset($this->items[$index]);

        }

        return $removed;

    }

    public function copy(Collection $another_collection)
    {
        $this->items = $another_collection->toArray();

    }

    public function getIterator()
    {

        return new ArrayIterator($this->items);

    }

    public function get($index)
    {
        if (array_key_exists($index, $this->items))
            return $this->items[$index];

        return FALSE;

    }

    public function count()
    {
        return count($this->items);

    }

    public function exists($index)
    {
        return array_key_exists($index, $this->items);

    }

    public function itemAt($index)
    {
        $result = isset($this->items[$index]);

        return $result;

    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset))
        {
            $this->items[] = $value;
        }
        else
        {
            $this->items[$offset] = $value;
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
            $result = $this->get($offset);
        }
        catch (\Exception $ex)
        {

        }

        return $result;

    }

    public function __toArray()
    {
        return $this->items;
    }

}

?>
