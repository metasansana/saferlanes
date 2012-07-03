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
 *  Class for manipulating the look of the screen.
 *
 */

namespace saferlanes\models;

use callow\ui\Templates;

class UserView extends Templates
{

    public function __construct()
    {

        parent::__construct(SL_TEMPLATE_PATH);

    }


    public function showSearchPage()
    {

        $this->addFileName('search.php');
        return $this;
    }

    public function showDriverProfilePage()
    {
        
        $this->addFileName('display.php');
        return $this;

    }


}

?>
