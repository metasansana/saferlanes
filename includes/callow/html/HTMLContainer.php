<?php

/**
 * timestamp Jul 7, 2012 12:06:49 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\html;
 *
 *  The HTMLContainer class holds html code that can be called by other classes or within template files.
 *
 */

namespace callow\html;

use callow\util\Collection;

class HTMLContainer extends Collection
{

    public function __construct()
    {
     //Does nothing
    }

    public function add($index, $item)
    {
        $item = (string)$item;
        parent::add($index, $item);

    }

}

?>
