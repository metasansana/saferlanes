<?php
namespace proof\util;
/**
 * timestamp Jul 17, 2012 10:30:51 PM
 *
 * The Collection interface contains a set of methods that can be used to interact with a collection of data.
 * The interface itself does not have an add method, this was done to allow implementors to define
 * what types can be added to them via the add() signature.
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 *
 *
 */
interface Collection extends \IteratorAggregate
{

    /**
     * Adds an item to the Collection using the index of $index
     */
    public function add($index, $item);

}