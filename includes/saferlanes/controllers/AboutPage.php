<?php

/**
 * timestamp Jun 9, 2012 10:42:14 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *  Controller for the about page.
 *
 */

namespace saferlanes\controllers;

use callow\mvc\Controller;

use callow\gui\Screen;

class AboutPage extends Controller
{

    public function main()
    {

        $screen = new Screen();

        $screen->setTemplate('about');

    }

}

?>
