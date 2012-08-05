<?php
namespace proof\util;
/**
 * timestamp Jul 22, 2012 6:25:51 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *
 */
abstract class AbstractListing extends AbstractAggregate implements Listing
{

    /**
     * Adds an item to this Listing
     * @param int $item
     * @return \proof\util\AbstractListing
     */
    public function add($item)
    {

        $this->items[] = $item;
        return $this;

    }

    /**
     * Sets an existing index to $item
     * @param int $index
     * @param mixed $item
     * @return \proof\util\AbstractAggregate
     *
     */
    public function set($index, $item)
    {

            if($this->indexAt($index))
            {
                $this->items[$index] = $item;
            }
            else
            {
                throw new IndexNotFoundException;
            }

            return $this;
        }


    public function getIterator()
    {

        return new ListIterator($this);

    }

}