<?php
namespace saferlanes;
/**
 * timestamp Jun 29, 2012 7:52:39 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *  The main class of the saferlanes application.
 *
 */
use proof\webapp\Application;
use proof\webapp\Browser;
use proof\webapp\CompositeBrowserSubscriber;
use proof\webapp\Page;
use proof\http\HttpRequest;
use proof\util\ArrayList;
use proof\util\Map;


final class Saferlanes extends Application
{

    const CONFIG_FILE = "etc/saferlanes/sl.ini";

    public function init()
    {



        return $this;

    }

    public function start()
    {

        $request =  new HttpRequest;

        $page = new Page(new ArrayList(), new Map);

        $main = new Main();

        $comp = new CompositeBrowserSubscriber();

        $comp->bind($main);

        $browser = new Browser($request, $page, $comp);

        $browser->submit();

        return $this;

    }

    public function finish()
    {

        return $this;

    }

}