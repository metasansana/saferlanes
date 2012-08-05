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
        $this->items = $items;
    }

    /**
     * Clears the internally aggregated items
     * @return \proof\util\AbstractAggregate
     */
    public function clear()
    {

        $this->items = array();
        return $this;

    }

    /**
     * Returns true if an index $index exists, false otherwise
     * @param mixed $index
     * @return boolean
     */
    public function indexAt($index)
    {
        if (@array_key_exists($index, $this->items))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    /**
     * Tests if an item is set at the specified index.
     * @param mixed $index
     * @return boolean
     */
    public function itemAt($index)
    {
        if(!($this->indexAt($index)))
            return FALSE;

        return isset($this->items[$index]);
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
     * @return boolean True if the item exisits and was removed, false if otherwise
     *
     */
    public function remove($index)
    {

        $flag = $this->indexAt($index);

        if ($flag)
            unset($this->items[$index]);

        return $flag;

    }

    public function isEmpty()
    {
        return empty($this->items);
    }


    /**
     * Returns the number of items in this aggregate.
     * @return int
     */
    public function size()
    {

        return count($this->items);
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