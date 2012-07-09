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

use callow\app\AbstractWindow;
use callow\event\Observer;
use callow\event\Event;
use saferlanes\views\MessageBox;
use saferlanes\core\Driver;


class Page extends AbstractWindow implements Observer
{

    const POST = 'post';
    const SEARCH = 'search';
    const SHOW = 'display';
    const PATH = 'templates/';

    public function selectTemplate($template)
    {

        if (!$template == Page::POST | Page::SEARCH | Page::SHOW)
            throw new \Exception('Invalid template in use!');

        $this->template->setFilePath(Page::PATH . $template . '.php')->enable();

    }


    public function promptMessage($msg, $type='error')
    {

        $this->container->add('msg', new MessageBox($msg, $type));
        $this->template->enable();

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
    elseif($event instanceof UpdateRequest)
    {

        $this->update($event);

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

    private function update(UpdateRequest $req)
    {

        foreach ($req->getChanges() as $label => $markup)
        {

            $this->insertHTML($label, $markup);


        }

        $this->template->enable();
        exit();

    }





}

?>
