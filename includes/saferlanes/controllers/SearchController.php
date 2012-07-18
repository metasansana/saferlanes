<?php

/**
 * timestamp May 30, 2012 8:41:26 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *
 */

namespace saferlanes\controllers;

use callow\app\AbstractController;
use callow\app\Options;
use callow\http\Redirect;
use saferlanes\models\DriverSearchParamExtractor;
use saferlanes\models\DriverGenerator;
use saferlanes\core\Driver;
use saferlanes\models\Engine;
use saferlanes\models\ActiveDatabaseFactory;
use saferlanes\models\SessionAgent;
use saferlanes\models\VotableDriverProfile;
use saferlanes\views\MessageBox;

class SearchController extends AbstractController
{

    const DRIVER_NOT_FOUND = "Sorry, looks like that driver is not in the database!";

    public function main(Options $opt = NULL)
    {

        $extr = new DriverSearchParamExtractor($opt);

        $plate = $extr->getParam();

        if (!$plate)
        {
            $this->output(Saferlanes::SEARCH_TEMPLATE);
        }
        else
        {

            $gen = new DriverGenerator();

            $gen->register($this->page);

            if ($gen->isValid($plate))
            {
                $this->fetch($gen->getDriver());
            }
            else
            {

                $this->output(Saferlanes::SEARCH_TEMPLATE);
            }
        }

    }

    private function fetch(Driver $driver)
    {

        $dfactory = new ActiveDatabaseFactory();

        $engine = new Engine($dfactory->getActiveDatabase());

        if ($engine->fetchDriver($driver))
        {

            $agent = new SessionAgent();

            $profile = new VotableDriverProfile($driver, $agent->generateToken("vote_key"));

            $profile->register($this->page);

            $profile->create();

            $this->output(Saferlanes::DISPLAY_TEMPLATE);
        }
        else
        {
            $this->page->render('msg', new MessageBox(SearchController::DRIVER_NOT_FOUND));

            $this->output(Saferlanes::SEARCH_TEMPLATE);
        }

    }

    private function output($template)
    {
        $this->page->import($template)->show();

    }

}

?>
