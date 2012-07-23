<?php

namespace proof\util;


/**
 * timestamp Jul 18, 2012 1:14:28 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\uti;
 *
 *
 */
abstract class AbstractAggregate implements Aggregate
{

    /**
     * The items that are part of this Aggregate.
     * @var array $items
     * @access protected
     */
    protected $items = array();

    public function __construct(array $items=NULL)
    {

        if($items)
        $this->items = $items;

    }

    /**
     * Clears the internally aggregated items
     * @return \proof\util\AbstractAggregate
     */
    public function clear()
    {

        unset($this->items);
        return $this;

    }

    /**
     * Returns true if an index $index exists, false otherwise
     * @param mixed $index
     * @return boolean
     */
    public function indexAt($index)
    {
        if (array_key_exists($index, $this->items))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    /**
     * Returns an item stored in the current Aggregate
     * @param mixed $index
     * @return mixed
     * @throws IndexNotFoundException
     */
    public function get($index)
    {

        if ($this->indexAt($index))
        {
            return $this->items[$index];
        }
        else
        {
            throw new IndexNotFoundException();
            return;
        }

    }

    /**
     * Removes an item at $index if it exists
     * @param mixed $index
     * @return \proof\util\AbstractAggregate
     * @throws IndexNotFoundException
     */
    public function remove($index)
    {

        if ($this->indexAt($index))
        {
            unset($this->items[$index]);
        }
        else
        {
            throw new IndexNotFoundException();
            return;
        }

        return $this;

    }

    /**
     * Sets an existing index to $item
     * @param mixed $index
     * @param mixed $item
     * @return \proof\util\AbstractAggregate
     * @throws IndexNotFoundException
     */
    public function set($index, $item)
    {

        if ($this->indexAt($index))
        {
            $this->items[$index] = $item;
        }
        else
        {
            throw new IndexNotFoundException();
        }

        return $this;

    }

    /**
     * Returns the number of items in this aggregate.
     * @return int
     */
    public function size()
    {

        $count = count($this->items);

        return $count;

    }

    /**
     * Returns an array representation of this aggregrate
     * @return array
     */
    public function toArray()
    {

        return $this->items;

    }

}