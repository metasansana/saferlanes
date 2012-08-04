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
use proof\http\Location;

class Browser implements PageContainer
{

    /**
     * The request associated with this browsert
     * @var proof\http\HttpRequest $request
     * @access private
     */
    private $request;

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

    public function __construct(HttpRequest $request, Page $page, BrowserSubscriber $s)
    {

        $this->request = $request;
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
     *
     */
    public function submitGet()
    {

        if ($this->request->isGet())
            $this->subscriber->OnGet($this, $this->request->getArgs ());

    }

    /**
     * Simulates a path submission event.
     *
     */
    public function submitPath()
    {

        $this->subscriber->OnPath($this, $this->request->getCleanPath());

    }

    /**
     * Simulates a POST request event.
     *
     */
    public function submitPost()
    {

        if ($this->request->isPost())
            $this->subscriber->OnPost($this, $this->request->getPost(), $this->request->getCleanPath());

    }

    /**
     * Calls all submit methods in sequence.
     *
     */
    public function submit()
    {

        $this->submitPath();
        $this->submitGet();
        $this->submitPost();

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

    public function getRequest()
    {
        return $this->request;
    }

}