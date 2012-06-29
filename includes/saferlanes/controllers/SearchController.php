<?php

/**
 * timestamp May 30, 2012 8:41:26 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *
 */

namespace saferlanes\controllers;

use callow\mvc\Controller;
use callow\http\Redirect;
use callow\http\PostReader;
use callow\ui\Templates;
use saferlanes\tools\TemplateFactory;


class SearchController extends Controller
{

    public function main()
    {

        $reader = new PostReader();

        if($reader->contains('plate'))
        {
            new Redirect('/'.$reader->get('plate'), TRUE);
        }

        $page = TemplateFactory::getSearchPage();

    }

}

?>
