<?php

/**
 * timestamp May 5, 2012 9:00:02 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  Controllers are simillar to the controllers in the MVC design pattern. They respond to user requests
 *  by calling in worker classes to perform various tasks.
 *
 */

namespace callow\app;

interface  Controller
{


    public function main (Options $opt = NULL);

    public function setWindow(Window &$view);


}

?>
