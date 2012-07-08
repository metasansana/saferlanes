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
use callow\http\PostReader;
use saferlanes\models\DriverValidation;
use saferlanes\core\DriverObject;
use saferlanes\models\Engine;
use saferlanes\tools\DriverSQLGenerator;
use saferlanes\models\ActiveDatabaseFactory;
use saferlanes\models\SessionAgent;
use saferlanes\models\DriverProfile;
use saferlanes\models\SQLFactory;

class SearchController extends AbstractController
{

    private $driver;

    public function main(Commands $params = NULL)
    {

        $this->view->selectTemplate('search');

        $reader = new PostReader();

        if ($reader->contains('plate'))  //Get platenumber from form
        {

            $this->fetchRequestedDriver($reader->get('plate'));

        }
        elseif ($params->count() === 1)  //get plate number from url
        {

            $this->fetchRequestedDriver($params[0]);
        }
        elseif ($params->count() > 1)  //erroneous input
        {

            new Redirect('/', TRUE);
        }


    }

    private function fetchRequestedDriver($plate_number)
    {

        $validator = new DriverValidation(new DriverObject());

        if(!$validator->assignPlateNumber($plate_number))
        {
            $this->view->promptMessage($validator->getErrorMessage('plate'), 'error');
        }
        else
        {
            $this->getFromDatabase($validator->getDriver());
        }

    }

    private function getFromDatabase(DriverObject &$driver)
    {

        $dfactory = new ActiveDatabaseFactory($this->view);


        $engine = new Engine($dfactory->getActiveDatabase(), $this->view);

        $engine->fetchDriver($driver, new SQLFactory(SQLFactory::LOAD_DRIVER));

        $this->show($driver);

        return $this;

    }

    private function show(DriverObject &$driver)
    {

        $agent = new SessionAgent($this->view);

        $agent->enableVoting($driver->getPlate());

        $profile = new DriverProfile($this->view, $driver);

        $profile->displayRequestedDriver();

    }

}

?>
