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
 *  Class that simulates the user's browser.
 *  Purpose:
 *  Simulates control over the user's browser.
 *
 *
 *
 *
 *
 */
use proof\http\HttpRequest, proof\http\HttpReply;
use proof\hwk\Page;
use proof\util\DispatchProxy;

class Browser implements IBrowser, DispatchProxy
{

    /**
     * Page object to be sent as html
     * @var Page $page
     * @access private
     */
    private $page;

    /**
     * Manager of browser events.
     * @var proof\webapp\BrowserEventDispatcher
     * @access  private
     */
    private $dispatch;

    /**
     * Internal HttpRequest object
     * @var proof\http\HttpRequest $request;
     * @access  private
     */
    private $request;

    public function __construct(Page $page = NULL)
    {

        $this->dispatch = new BrowserEventDispatcher;
        $this->request = new HttpRequest;
        $this->page = $page;

    }

    /**
     * Attacheds a listener to the internal dispathcerd
     * @param \proof\webapp\BrowserListener $l
     * @return \proof\webapp\Browser
     */
    public function  attachListener(BrowserListener $l)
    {

        $this->dispatch->bind($l);

        return $this;
    }

    /**
     *  Returns the internal dispatcher
     * @return type
     */
    public function getDispatcher()
    {
        return $this->dispatch;
    }

    public function getRequest()
    {

        return $this->request;

    }

    /**
     * Checks the various input mechanisms the browser can use.
     * @todo add GET support.
     * @return \proof\webapp\Browser
     */
    public function checkInput()
    {

        if($this->request->isPost())
            $this->dispatch->notifyOnHttpPost (new HttpPostEvent ($this, $this->request->getPost()));

        $this->dispatch->notifyOnLocationChanged(new LocationChangedEvent($this, $this->request->getPaths()));

        return $this;

    }

    /**
     * Returns an HttpReply object that can be used to send http replies to the browser.
     * @return \proof\http\HttpReply
     */
    public function sendReply()
    {

        return new HttpReply;

    }

    /**
     * Changes the page of browser.
     * @param \proof\hwk\Page $page
     */
    public function updatePage(Page $page)
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

    public function refresh()
    {

        if($this->page)
            $this->page->show();

    }

}