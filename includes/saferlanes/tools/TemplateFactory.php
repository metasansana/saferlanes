<?php

/**
 * timestamp Jun 28, 2012 11:17:38 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\tools
 *
 *
 */

namespace saferlanes\tools;

use callow\ui\Templates;

class TemplateFactory
{


    public static function getSearchPage()
    {
        $page = new Templates(SL_TEMPLATE_PATH);
        $page->addFileName('search.php');

        return $page;
    }

}

?>
