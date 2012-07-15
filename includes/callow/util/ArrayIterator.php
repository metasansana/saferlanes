<?php

/**
 * timestamp Jul 14, 2012 4:15:01 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Iterator for looping over collections.
 *
 */

namespace callow\util;

class ArrayIterator implements callow\util\Iterator
{

    /**
     * Reference to the collection being iterated.
     * @var array $c
     * @access protected
     */
    protected $items;

    /**
     * The number of items in the collection.
     * @var int $count
     * @access protected
     */
    protected $size;

    /**
     * Internal pointer to the collection.
     * @var int $ptr
     * @access protected
     */
    protected $ptr = 0;

    public function __construct(array $items, $size)
    {
        $this->items = $items;
        $this->size = (int)$size;
    }

    public function hasNext()
    {

        if($this->ptr >= $this->size)
            return TRUE;

        return FALSE;

    }

    public function next()
    {
        $next = $this->items[$ptr];
        $this->ptr++;
        return $next;
    }



}

?>
