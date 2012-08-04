<?php

namespace saferlanes;

/**
 * timestamp Jul 29, 2012 10:12:18 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */
use proof\webapp\AbstractBrowserSubscriber;
use proof\webapp\Browser;
use proof\util\ArrayList;
use proof\util\Map;
use proof\http\Location;

class Main extends AbstractBrowserSubscriber
{

    public function onGet(Browser $browser, ArrayList $path, Map $args)
    {

        $strategy = new ControllerStrategy;

        if ($path->size() > 4)
        {
            $redirect = new Location("/");
            $redirect->send();
        }
        elseif ($path->isEmpty())
        {
            $strategy->useDefault();
        }
        elseif ($path->get(0) === 'post')
        {
            $strategy->usePost();
        }
        elseif ($path->get(0) === 'vote')
        {
            $strategy->useVote();
        }
        elseif ($path->get(0) === 'search')
        {
            $strategy->useDefault();
        }
        elseif ($path->size() === 1)
        {
            $strategy->useSearch();
        }
        else
        {
            $redirect = new  Location("/");
            $redirect->send();
        }

        $browser->flushSubscriber();

        $browser->setSubscriber($strategy->getController());

        $browser->submitGet();

    }

    public function onPost(Browser $browser, ArrayList $path, Map $args)
    {

        $strategy = new ControllerStrategy;


        $browser->flushSubscriber();

        $browser->setSubscriber(new PostController);

        $browser->submitPost();


    }

}