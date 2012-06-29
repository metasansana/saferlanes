<?php

/**
 * timestamp Jun 28, 2012 9:45:09 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\ui
 *
 *  Widgets are structured markup used to represent some object that will be displayed to a user.
 *
 */

namespace callow\ui;

abstract class Widget
{
    /**
     * The markup code used to display the widget.
     * @var string $html
     * @access protected
     */
    protected $html = "";

    public function __toString()
    {

        return $this->html;
    }

}

?>
