<?php
namespace proof\util;
/**
 * timestamp Jul 18, 2012 12:55:04 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util;
 *
 * The root interface for the Collection and List structures.
 *
 *
 *
 *
 *
 */
interface Aggregate extends \IteratorAggregate
{
    
    /**
     * Returns the value stored at a specific index
     *
     *
     */
    public function get($index);


    /**
     * Removes all item members.
     *
     */
    public function clear();

    /**
     * Tests for the existence of an index
     */
    public  function indexAt($index);

    /**
     * Returns the number of elements in the Collection
     *
     */
    public function size();

    /**
     * Removes the item at $index
     *
     */
    public function remove($index);

    /**
     * Returns a array representation of this object
     *
     */
    public function toArray();






}