<?php

/**
 * timestamp Jul 7, 2012 8:41:44 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  AbstractWindow child classes are used to manipulate the 'view' of an application.
 *
 */

namespace callow\app;

use callow\html\Template;

use callow\html\HTMLContainer;

abstract class AbstractWindow implements Window
{

    protected  $container;

    protected $template;


    public function __construct()
    {

        $this->container = new HTMLContainer;

        $this->template = new Template();


    }

    public function insertHTML($label, $markup)
    {
        $this->container->add($label, $markup);
    }

        public function __destruct()
    {
        $this->template->setContainer($this->container);

    }

}

?>
