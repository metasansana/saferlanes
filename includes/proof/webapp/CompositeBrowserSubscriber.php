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
use proof\util\Map;

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

    public function onGet(Browser $browser, ArrayList $path, Map $args)
    {

        foreach ($this->subscribers as $s)
        {

            $s->onGet($browser, $path, $args);
        }

    }

    public function onPost(Browser $browser, ArrayList $path, Map $post)
    {

        foreach ($this->subscribers as $s)
        {

            $s->onPost($browser, $path,  $post);
        }

    }


}