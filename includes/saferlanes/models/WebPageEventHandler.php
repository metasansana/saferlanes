<?php

/**
 * timestamp Jul 10, 2012 5:43:50 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  Class that handles internals events thrown at the WebPage.
 *
 */

namespace saferlanes\models;

use callow\event\Event;
use callow\event\UserNotice;
use callow\event\UserWarn;
use callow\event\Panic;
use saferlanes\views\MessageBox;
use saferlanes\views\AlertBar;

class WebPageEventHandler
{

    /**
     * Internal reference to the target WebPage object.
     * @var WebPage $page
     * @access private
     */
    private $page;


    public function __construct(WebPage &$page)
    {

        $this->page = $page;

    }

    public function process(Event &$event)
    {
        $result = TRUE;

         if ($event instanceof Panic)
        {
            header('Status: 500 Internal Server Error');
            exit();
        }
        elseif ($event->getSource() instanceof DriverValidator)
        {

            $this->handleDriverValidator($event);

        }
        elseif ($event->getSource() instanceof SessionAgent)
        {

            $this->handleSessionAgent($event);

        }
        elseif($event->getSource() instanceof Engine)
        {
            $this->handleEngine($event);
        }
        else
        {
            $result =  FALSE;
        }

        return $result;

    }

    private function handleDriverValidator(Event &$event)
    {

        if($event instanceof UserWarn)

            $this->page->set('msg', new MessageBox($event, 'error'));


    }

    private function handleSessionAgent(Event &$event)
    {

        if($event instanceof UserWarn)
        $this->page->set('system', new AlertBar($event));

        if($event instanceof NewSessionKeyNotice)
        {
            $this->page->set($event->getKey(), $event->getValue());
        }

}

private function handleEngine(Event &$event)
{
    if($event instanceof UserWarn)
        $this->page->set('msg', new MessageBox($event, 'notice'));
}
}

?>
