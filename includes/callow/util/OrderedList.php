<?php

/**
 * timestamp Jul 14, 2012 8:37:54 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Collection of items stored in a numeric fashion
 *
 */

namespace callow\util;

class OrderedList extends Collection {


    /**
     * Appends an item to the end of the list
     * @param mixed $item
     * @return \callow\util\OrderedList
     */
    public function add($item)
    {
        $this->items[] = $item;
        return $this;
    }

   public function copy(OrderedList $list)
   {
       return parent::__copy($list);
   }
}
?>
