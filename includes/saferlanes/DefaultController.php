<?php
namespace saferlanes;
/**
 * timestamp Aug 1, 2012 11:19:00 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *  The default controller of the saferlanes application. This is given control when the user
 *  visits the root of the website.
 *
 */
use proof\webapp\AbstractBrowserSubscriber;
use proof\util\ArrayList;
use proof\util\Map;
use proof\webapp\Browser;

class DefaultController extends AbstractBrowserSubscriber
{

    const HEAD_TEMPLATE = 'templates/head.php';
    const SEARCH_FORM_TEMPLATE = "templates/search.php";
    const END_TEMPLATE = "templates/end.php";



    public function onGet(Browser $browser, ArrayList $path, Map $args)
    {

        $strategy = new PageStrategy($browser->getPage());

        $strategy->useSearchPage();

        $strategy->getPage()->show();


    }

}