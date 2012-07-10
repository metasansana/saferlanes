<?php

/**
 * timestamp Jul 7, 2012 12:07:09 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\html
 *
 *  Abstract class representing custom html page sections or elements.
 *
 */

namespace callow\html;

abstract class Widget
{

    /**
     * Contains the raw html code of this widget.
     * @var string $html
     * @access protected
     */
    protected  $html;

    public function __construct($markup)
    {
        $this->html = $markup;
    }

    public function __toString()
    {
        return $this->html;
    }

}

?>
