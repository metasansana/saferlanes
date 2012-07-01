<?php

/**
 * timestamp Jun 28, 2012 11:17:38 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *
 */

namespace saferlanes\controllers;

use callow\ui\Templates;

class Display extends Templates
{


    public function toSearchPage()
    {

        $this->addFileName('search.php');
        return $this;
    }

}

?>
