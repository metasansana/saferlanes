<?php

/**
 * timestamp May 30, 2012 5:09:21 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controlles;
 *
 *  Controller for posting new drivers;
 *
 */

namespace saferlanes\controllers;

use callow\app\AbstractController;
use callow\app\Options;
use callow\http\Post;
use callow\util\Notice;
use callow\http\Redirect;
use saferlanes\models\DriverGenerator;
use saferlanes\models\ActiveDatabaseFactory;
use saferlanes\models\Engine;
use saferlanes\views\MessageBox;

class PostController extends AbstractController
{

    public function main(Options $opt = NULL)
    {

        $post = new Post();

        if ($post->contains('plate'))
        {

            $gen = new DriverGenerator();

            $gen->register($this->page);

            if ($gen->isValid($post->get('plate')))
            {
                $dfactory = new ActiveDatabaseFactory();

                $engine = new Engine($dfactory->getActiveDatabase());

                $driver = $gen->getDriver();

                $driver->setTimeStamp();

                if ($engine->createDriver($driver))
                {
                    new Redirect("/{$driver->getPlate()}", TRUE, TRUE);
                }
                else
                {
                    if($engine->getState() === Engine::DUPEX)
                        $this->page->render ('msg', new MessageBox('That driver is in the database already!'));

                    $this->page->import(Saferlanes::POST_TEMPLATE)->show();
                }
            }
            else
            {
                $this->page->import(Saferlanes::POST_TEMPLATE)->show();
            }
        }
        else
        {
            $this->page->import(Saferlanes::POST_TEMPLATE)->show();
        }

    }

}

?>
