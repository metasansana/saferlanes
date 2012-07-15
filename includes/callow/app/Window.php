<?php

/**
 * timestamp Jul 7, 2012 10:29:22 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  Inteface for classes that provide a 'view' to the system.
 *
 */

namespace callow\app;

interface Window
{

    public function render($label, $html);

}

?>
