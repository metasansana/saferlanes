<?php
namespace proof\webapp;
/**
 * timestamp Jul 31, 2012 10:00:41 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proff\webapp
 *
 *  Empty implementation of the BrowserSubscriber interface.
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

class AbstractBrowserSubscriber implements BrowserSubscriber
{


    public function onGet(Browser $browser, ArrayList $paths, Map $args)
    {

    }

    public function onPost(Browser $browser, ArrayList $path, Map $post)
    {

    }
}