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
 *
 */

namespace saferlanes\controllers;

use callow\app\AbstractController;
use callow\app\Commands;
use callow\http\Redirect;
use saferlanes\models\SessionAgent;
use saferlanes\models\SQLFactory;
use saferlanes\core\Driver;
use saferlanes\models\DriverValidator;
use saferlanes\models\Engine;
use saferlanes\models\ActiveDatabaseFactory;

class VoteController extends AbstractController
{

    public function main(Commands $params = NULL)
    {

        if($params)
        {
            $agent = new SessionAgent($this->window);

            if($agent->verify('vote_key', $params[3]))
            {
                    $this->vote($params->__toArray());
            }
            else
            {
                new Redirect('/', TRUE);
            }
        }
    }


    private function vote(array &$cmd)
    {



        $validator = new DriverValidator(new Driver());

        $validator->register($this->observers);

        if($validator->assignPlateNumber($cmd[2]))
        {

            $driver = $validator->getDriver();

            $dfactory = new ActiveDatabaseFactory($this->observers);

            $engine = new Engine($dfactory->getActiveDatabase(), $this->observers);

            $engine->castVote($driver, $cmd[1]);

            new Redirect("/{$driver->getPlate()}", TRUE);

        }

    }

}

?>
