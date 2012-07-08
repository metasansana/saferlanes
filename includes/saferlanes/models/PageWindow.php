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
 * This class has methods for the following phases:
 *
 */

namespace saferlanes\models;

use callow\app\AbstractWindow;
use callow\event\Subscriber;
use callow\event\Event;
use saferlanes\views\MessageBox;
use saferlanes\core\Driver;


class PageWindow extends AbstractWindow implements Subscriber
{

    const POST = 'post';
    const SEARCH = 'search';
    const SHOW = 'display';
    const PATH = 'templates/';

    public function selectTemplate($template)
    {

        if (!$template == PageWindow::POST | PageWindow::SEARCH | PageWindow::SHOW)
            throw new \Exception('Invalid template in use!');

        $this->template->setFilePath(PageWindow::PATH . $template . '.php')->enable();

    }


    public function promptMessage($msg, $type='error')
    {

        $this->container->add('msg', new MessageBox($msg, $type));

        return $this;

    }

    public function notify(Event &$event)
    {

        if( $event instanceof FatalError)
        {
            $this->haltOnError();
        }
        elseif ($event instanceof FetchFailure)
            {

            $this->promptMessage($event, 'notice');
            exit();

    }

    }

    public function displayDriver(Driver &$driver)
    {

        $this->selectTemplate('display');
        $this->template->enable();
        

    }


    private function  haltOnError()
    {

        $this->template->disable();
        header("Status: 500 Internal Server Error");


    }




}

?>
