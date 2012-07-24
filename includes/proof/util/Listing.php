<?php
namespace proof\util;
/**
 * timestamp Jul 22, 2012 6:20:43 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util;
 *
 *  Listings are like collections however items must be added in a sequential order.
 *
 */
interface Listing extends Aggregate
{

    /**
     * Adds an item to the listing
     */
    public function add($item);
    
    /**
     * Sets the value at location $index to $item
     */
    public function set($index, $item);


}