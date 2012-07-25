<?php

namespace proof\hwk;


/**
 * timestamp Jul 25, 2012 8:10:02 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk
 *
 *  Abstract class containing partial implementation for the ViewPort interface.
 *
 */
abstract class AbstractViewPort implements ViewPort
{

    /**
     * Flag that is set when the show() method is called.
     * @var boolean $shown = FALSE
     * @access protected
     */
    protected $showed = FALSE;

    /**
     * Flag indicating whether the output was sent already or not.
     * @return boolean
     */
    public function showed()
    {
        return $this->showed;

    }

    /**
     * Sends output to the user's browser.
     */
    public function show()
    {

        $this->showed = TRUE;

        return $this->showed();

    }

}