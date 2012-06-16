<?php

/**
 * timestamp Jun 9, 2012 1:10:34 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\gui
 *
 * The search form for finding a driver.
 */

namespace saferlanes\gui;

use callow\gui\ScreenWriter;
use callow\gui\Screen;

class SearchForm extends ScreenWriter
{


    public function __construct(Screen &$screen)
    {
        $screen->setTemplate('search');
        parent::__construct($screen);
        
    }

}

?>
