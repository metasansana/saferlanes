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
use callow\http\MethodReader;
use callow\gui\Screen;
use saferlanes\gui\SearchForm;


class SearchController extends Controller
{



    public function main()
    {

        $reader = new MethodReader(MethodReader::POST);

        if($reader->hasMember('plate'))
        {
            new Redirect('/'.$reader->get('plate'), TRUE);
        }

        $form = new SearchForm(new Screen);

    }

}

?>
