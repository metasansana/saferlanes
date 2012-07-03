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

use callow\app\Controller;
use callow\app\Parameters;
use callow\http\Redirect;
use callow\http\PostReader;
use callow\http\Session;
use callow\galaxy\Error;
use saferlanes\core\TrackedDriver;
use saferlanes\models\SLEngine;
use saferlanes\tools\DriverSQLGenerator;
use saferlanes\models\ActiveDatabaseFactory;
use saferlanes\models\Report;

class SearchController extends AppController
{

    private $driver;

    public function main(Parameters $params = NULL)
    {

        $reader = new PostReader();

        if ($reader->contains('plate'))  //Get platenumber from form
        {

            $this->validate($reader->get('plate'))->find()->show();
            
        }
        elseif ($params->count() === 1)  //get plate number from url
        {

            $this->validate($params[0])->find()->show();
        }
        elseif ($params->count() > 1)  //erroneous input
        {

            new Redirect('/', TRUE);
        }
        elseif ($params->count() < 1)    //no input
        {

            $this->view->showSearchPage();
        }

    }

    private function validate($plate_number)
    {

        $driver = new TrackedDriver();

        try
        {

            $driver->setPlate($plate_number);

            $this->driver = $driver;
        }
        catch (Error $err)
        {

            $this->view->showSearchPage();
            $this->erhandler->handleError($err);

        }

        return $this;

    }

    private function find()
    {

        $engine = new SLEngine(ActiveDatabaseFactory::getDatabase());

        try
        {
            $this->driver = $engine->find($this->driver, DriverSQLGenerator::getLoadCode());
        }
        catch (\Exception $ex)
        {
            header("HTTP/1.1 500 Internal Server Error");
            exit(); //@todo proper exception handling

        }

        return $this;

    }

    private function show()
    {

        $report = new Report($this->view, $this->driver, new Session);

        $report->show();

    }

}

?>
