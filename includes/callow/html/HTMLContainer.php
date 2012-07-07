<?php

/**
 * timestamp Jul 7, 2012 12:06:49 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\html;
 *
 *  The container class holds html code that can be called by other classes or within template files.
 *
 */

namespace callow\html;

use callow\util\GenericCollection;

class HTMLContainer extends GenericCollection
{

    public function add($index, $item)
    {
        $item = (string)$item;
        parent::add($index, $item);

    }

}

?>
