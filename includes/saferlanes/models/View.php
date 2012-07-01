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
 *  Class that controllers how data is render in the web browser.
 *
 */

namespace saferlanes\models;

use callow\ui\Templates;

class View extends Templates
{


    public function toSearchPage()
    {

        $this->addFileName('search.php');
        return $this;
    }

}

?>
