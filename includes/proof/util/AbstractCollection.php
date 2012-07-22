<?php

namespace proof\util;


/**
 * timestamp Jul 18, 2012 10:01:52 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package
 *
 *
 */
abstract class AbstractCollection extends AbstractAggregate implements Collection
{

    /**
     * Adds an item to this Collection
     * @param mixed $index
     * @param mixed $item
     * @return \proof\util\AbstractCollection
     */
    public function add($index, $item)
    {
        $this->items[$index] = $item;
        return $this;
    }

}