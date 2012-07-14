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

class CollectionIterator implements Iterator
{

    /**
     * Reference to the collection being iterated.
     * @var array $c
     * @access protected
     */
    protected $c;

    /**
     * The number of items in the collection.
     * @var int $count
     * @access protected
     */
    protected $count;

    /**
     * Internal pointer to the collection.
     * @var int $ptr
     * @access protected
     */
    protected $ptr = 0;

    public function __construct(Collection &$c)
    {
        $this->c = $c->__toArray();
        $this->count = $c->count();
    }

    public function hasNext()
    {

        if($this->ptr >= $this->count)
            return TRUE;

        return FALSE;

    }

    public function next()
    {
        $next = $this->c[$ptr];
        $this->ptr++;
        return $next;
    }



}

?>
