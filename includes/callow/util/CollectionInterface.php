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

interface CollectionInterface
{

    public function add($member, $index=NULL);

    public function remove($index);

    public function count();

    public function hasMember($index);

    public function hasIndex($index);

    public function toArray();

    public function getIterator();

    public function get($index);

}

?>
