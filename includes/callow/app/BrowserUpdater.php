<?php

/**
 * timestamp Jul 14, 2012 9:19:42 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  The BrowserUpdater implementing classes push update events (BrowserUpdate) to classes that
 *  act as the 'view' for the program.
 *
 */

namespace callow\app;

interface  BrowserUpdater
{

    public function register(BrowserUpdateListener &$bul);

}

?>
