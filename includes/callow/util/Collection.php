<?php

/**
 * timestamp May 30, 2012 4:09:44 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  The Collection interface provides a way to collect, inspect and manipulate a stable simillar data items.
 *  The interface leaves the signature of the add() method up to implementers to allow cont
 *
 */

namespace callow\util;

interface Collection extends \ArrayAccess, \IteratorAggregate, \Countable
{


    public function remove($index);

    public function contains($index);

    public function hasIndex($index);

    public function get($index);

}

?>
