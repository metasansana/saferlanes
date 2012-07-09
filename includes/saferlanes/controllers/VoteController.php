<?php

/**
 * timestamp May 31, 2012 9:43:16 PM
 *
 *
 * @project roadtroll
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controller
 *
 *  @todo Remove html from this and other such classes and put into the 'Window'
 *
 */

namespace saferlanes\controllers;

use callow\app\AbstractController;
use callow\app\Commands;
use callow\http\Redirect;
use saferlanes\models\SessionAgent;
use saferlanes\models\SQLFactory;
use saferlanes\core\DriverObject;
use saferlanes\models\DriverValidation;
use saferlanes\models\Engine;
use saferlanes\models\ActiveDatabaseFactory;

class VoteController extends AbstractController
{

    public function main(Commands $params = NULL)
    {

        if($params)
        {
            $agent = new SessionAgent($this->view);

            if($agent->verifyRequest('vote_key', $params[3]))
                    $this->vote($params);
        }
        else
        {
            new Redirect('/', TRUE);
        }
    }


    private function vote(Commands &$cmd)
    {

        if($cmd[1] === 'plus')
        {

            $sql = SQLFactory::VOTE_PLUS;

        }
        elseif($cmd[1] === 'minus')
        {

                $sql = SQLFactory::VOTE_MINUS;

        }
        else
        {

         new Redirect('/', TRUE);  //@ replace with a nice error message.
         exit();

        }

        $validator = new DriverValidation();

        if($validator->assignPlateNumber($cmd[2]))
        {

            $driver = $validator->getDriver();

            $dfactory = new ActiveDatabaseFactory($this->view);

            $engine = new Engine($dfactory->getActiveDatabase(), $this->view);

            die($sql);

            $engine->updateDriver($driver, new SQLFactory($sql));

            //By here the profile has been updated. We would like to fire an event that alerts
            //all classes interested including the window object.

            echo "Done!";

        }
        else
        {
            new Redirect('/', TRUE);
        }



    }

}

?>
