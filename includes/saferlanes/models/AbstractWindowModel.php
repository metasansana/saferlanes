<?php

/**
 * timestamp Jul 8, 2012 10:03:21 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  Abstract parent class for all models that need to modify the Window directly
 *
 */

namespace saferlanes\models;

abstract class AbstractWindowModel
{


    /**
     * Reference to the current window object.
     * @var AbstractWindow $win
     * @access protected
     */
    protected $win;

    public function __construct(AbstractWindow &$win)
    {

        $this->win =$win;

    }
}

?>
