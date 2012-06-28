<?php

/**
 * timestamp May 30, 2012 4:09:44 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *
 */

namespace callow\util;

interface Collection extends \ArrayAccess, \IteratorAggregate, \Countable
{

    public function add($member, $index);

    public function remove($index);

    public function contains($index);

    public function hasIndex($index);
        
    public function get($index);

}

?>
