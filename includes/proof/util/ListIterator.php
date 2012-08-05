<?php
namespace proof\util;
/**
 * timestamp Jul 22, 2012 7:29:52 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 * Iterator for sequentially iterating over Listing objects.
 *
 */
class ListIterator implements \Iterator
{

    /**
     * The iteratable items
     * @var Listing $items
     * @access private
     */
    private $items;

    /**
     * Pointer to the items
     * @var int $ptr
     * @access private
     */
    private $ptr;


    public function __construct(Listing $items)
    {

        $this->items = $items;

    }

    public function current()
    {
        return $this->items->get($this->ptr);
    }

    public function key()
    {

        return $this->ptr;

    }

    public function next()
    {

        $item = $this->items->get($this->ptr);
        $this->ptr++;
        return $item;

    }

    public function rewind()
    {

        $this->ptr = 0;

    }

    public function valid()
    {

          if($this->ptr < $this->items->size())
            return TRUE;

        return FALSE;

    }

}