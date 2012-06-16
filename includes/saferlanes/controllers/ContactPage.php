<?php

/**
 * timestamp Jun 9, 2012 10:42:31 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers;
 *
 *
 */

namespace saferlanes\controllers;

use callow\mvc\Controller;

use callow\gui\Screen;

class ContactPage
{

 public function main()
    {

        $screen = new Screen();

        $screen->setTemplate('contact');

    }

}

?>
