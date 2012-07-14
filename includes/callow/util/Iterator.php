<?php

/**
 * timestamp Jul 14, 2012 4:13:12 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  A callow specifc version of the Iterator interface.
 *
 */

namespace callow\util;

interface Iterator
{

    public function hasNext();

    public function next();

}

?>
