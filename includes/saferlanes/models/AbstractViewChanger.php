<?php

/**
 * timestamp Jul 1, 2012 10:20:28 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */

namespace saferlanes\models;

abstract class AbstractViewChanger
{

    protected $view;


    public function __construct(UserView &$view)
    {

        $this->view = $view;

    }



}

?>
