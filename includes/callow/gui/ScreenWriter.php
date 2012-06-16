<?php

/**
 * timestamp Jun 9, 2012 11:12:22 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\gui;
 *
 *  Parent class for classes that exist to modify a screen object.
 */

namespace callow\gui;

abstract  class ScreenWriter
{

    /**
     * Reference to the current screen object.
     * @var Screen $screen
     * @access protected
     */
    protected $screen;

    public function __construct(Screen &$screen)
    {
        $this->screen = $screen;
    }


}

?>
