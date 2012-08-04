<?php

namespace proof\webapp;

/**
 * timestamp Aug 3, 2012 7:17:00 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Class that stores multiple browser subsciber objects.
 *
 */
use proof\util\ArrayList;

class CompositeBrowserSubscriber implements BrowserSubscriber
{

    /**
     * List of subscribers
     * @var proof\util\ArrayList $subscribers
     * @access private
     */
    private $subscribers;

    public function __construct()
    {

        $this->subscribers = new ArrayList;

    }

    /**
     * Binds a subscriber to this class.
     * @param \proof\webapp\BrowserSubscriber $s
     * @return \proof\webapp\CompositeBrowserSubscriber
     */
    public function bind(BrowserSubscriber $s)
    {
        $this->subscribers->add($s);
        return $this;

    }

    public function onGet(Browser $browser, \proof\util\Map $args)
    {

        foreach ($this->subscribers as $s)
        {

            $s->onGet($browser, $args);
        }

    }

    public function onPath(Browser $browser, ArrayList $paths)
    {

        foreach ($this->subscribers as $s)
        {

            $s->onPath($browser, $paths);
        }

    }

    public function onPost(Browser $browser, \proof\util\Map $post)
    {

        foreach ($this->subscribers as $s)
        {

            $s->onPost($browser, $post);
        }

    }


}