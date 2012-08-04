<?php
namespace proof\webapp;

/**
 * timestamp Jul 29, 2012 9:03:43 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Class for simulating the user's browser for the 'view' in a web application.
 *
 *
 *
 *
 *
 */
use proof\http\HttpRequest;

class Browser implements PageContainer
{

    /**
     * Page object to be sent as html
     * @var Page $page
     * @access private
     */
    private $page;

    /**
     * Subscriber to browser events
     * @var proof\webapp\BrowserEventDispatcher
     * @access  private
     */
    private $subscriber;

    public function __construct(Page $page, BrowserSubscriber $s)
    {

        $this->page = $page;
        $this->subscriber = $s;


    }

    /**
     * Attaches subscriber to this browser.
     * @param \proof\webapp\BrowserSubscriber $s
     * @return \proof\webapp\Browser
     */
    public function setSubscriber(BrowserSubscriber $s)
    {

        $this->subscriber = $s;

        return $this;

    }

    public function flushSubscriber()
    {
        $s = $this->subscriber;
        $this->subscriber = NULL;
        return $s;
    }

    /**
     * Simulates a GET request event
     * @param \proof\http\HttpRequest $request
     */
    public function submitGet(HttpRequest $request)
    {

        if ($request->isGet())
            $this->subscriber->OnGet($this, $request->getArgs ());

    }

    /**
     * Simulates a path submission event.
     * @param \proof\http\HttpRequest $request
     */
    public function submitPath(HttpRequest $request)
    {

        $this->subscriber->OnPath($this, $request->getCleanPath());

    }

    /**
     * Simulates a POST request event.
     * @param \proof\http\HttpRequest $request
     */
    public function submitPost(HttpRequest $request)
    {

        if ($request->isPost())
            $this->subscriber->OnPost($this, $request->getPost());

    }

    /**
     * Calls all submit methods in sequence.
     * @return \proof\webapp\Browser
     */
    public function submit(HttpRequest $request)
    {

        $this->submitPath($request);
        $this->submitGet($request);
        $this->submitPost($request);

    }

    /**
     * Changes the page of browser.
     * @param \proof\hwk\Page $page
     */
    public function setPage(Page $page)
    {

        $this->page = $page;

    }

    /**
     * Returns the page of the Browser (if any)
     * @return proof\hwk\Page | NULL
     */
    public function getPage()
    {
        return $this->page;

    }

}