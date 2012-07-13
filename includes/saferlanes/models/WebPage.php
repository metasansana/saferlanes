<?php

/**
 * timestamp Jul 7, 2012 8:31:29 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 * Class that manages the views for the saferlanes application.
 * /XXX flagged for clean up.
 *
 */

namespace saferlanes\models;

use callow\html\Template;
use callow\app\Window;
use callow\event\Observer;
use callow\event\Event;
use saferlanes\views\MessageBox;
use saferlanes\core\Driver;


class WebPage implements Observer, Window
{

    const POST = 'post';
    const SEARCH = 'search';
    const DISPLAY = 'display';
    const PATH = 'templates/';

    private $template;

    public function __construct()
    {
        $this->template = new Template();
    }



    private function prompt($msg, $type='error')
    {

        $this->container->add('msg', new MessageBox($msg, $type));

        $this->finish();

        return $this;

    }

        private function  halt()
    {

        $this->template->disable();
        header("Status: 500 Internal Server Error");


    }

    public function set($label, $html)
    {
        $html = (string)$html;

        $this->template->set($label, $html);

        return $this;
    }

    /**
     *
     * @param AbstractEvent $event
     * @return boolean
     */
    public function notify(Event &$event)
    {

        $handler = new WebPageEventHandler($this);

        return $handler->process($event);

    }

public function import($name)
{

        if (!$name == WebPage::POST | WebPage::SEARCH | WebPage::DISPLAY)
            throw new \Exception('Invalid template in use!');

        $this->template->name(WebPage::PATH . $name . '.php');

        return $this;

}

public function display()
{
    $this->template->enable();

}


}

?>
