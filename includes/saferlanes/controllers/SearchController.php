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
use callow\app\Commands;
use callow\http\Redirect;
use callow\http\Post;
use saferlanes\models\DriverValidator;
use saferlanes\core\Driver;
use saferlanes\models\Engine;
use saferlanes\models\ActiveDatabaseFactory;
use saferlanes\models\SessionAgent;
use saferlanes\models\DriverProfile;
use saferlanes\models\VoteLinks;

class SearchController extends AbstractController
{

    private $driver;

    public function main(Commands $params = NULL)
    {

        $plate = NULL;

        if($params->count() > 1)
                new Redirect('/', TRUE);

        if(($params->count() === 1))
        {



             $plate = $params[0];

        }
        else
        {

            $posted = new Post();

            if($posted->contains('plate'))
                $plate= $posted->get('plate');

        }

        if(isset($plate))
        {
            $this->fetch ($plate);
        }
        else
        {

        $this->output('search');

        }


   }

    private function fetch($plate)
    {

        $validator = new DriverValidator(new Driver());

        $validator->register($this->observers);

        if($validator->assignPlateNumber($plate))
        {
            $this->getFromDatabase($validator->getDriver());
        }
        else
        {
         $this->output('search');
        }


    }

    private function getFromDatabase(Driver &$driver)
    {

        $dfactory = new ActiveDatabaseFactory($this->observers);

        $engine = new Engine($dfactory->getActiveDatabase(), $this->observers);

        if($engine->fetchDriver($driver))
        {
             $this->prepare($driver);
        }
        else
        {
            $this->output('search');
        }

    }

    private function prepare(Driver &$driver)
    {

        $agent = new SessionAgent();

        $agent->register($this->observers);

        $links = new VoteLinks($this->window, $driver, $agent->generateToken($driver->getPlate()));

        $links->create();

        $profile = new DriverProfile($this->window, $driver);

        $profile->create();



        $this->output('display');


    }

    private function output($template)
    {
     $this->window->import($template)->display();
    }

}

?>
