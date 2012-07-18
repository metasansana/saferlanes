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
use callow\app\Options;
use callow\http\Redirect;
use saferlanes\models\SessionAgent;
use saferlanes\models\SQLFactory;
use saferlanes\core\Driver;
use saferlanes\models\DriverGenerator;
use saferlanes\models\Engine;
use saferlanes\models\ActiveDatabaseFactory;


class VoteController extends AbstractController
{

    public function main(Options $opt= NULL)
    {

        if($opt)
        {
            $agent = new SessionAgent();

            if($agent->verify('vote_key', $opt[3]))
            {
                    $this->vote($opt->__toArray());
            }
            else
            {
                new Redirect('/', TRUE);
            }
        }
    }


    private function vote(array &$cmd)
    {

        $gen = new DriverGenerator();

        $gen->register($this->page);

        if($gen->isValid($cmd[2]))
        {

            $dfactory = new ActiveDatabaseFactory();

            $engine = new Engine($dfactory->getActiveDatabase());

            $driver = $gen->getDriver();

            $result = FALSE;

            if($cmd[1] === 'minus')
                $result = $engine->minusDriver($driver);

            if($cmd[1] === 'plus')
                $result = $engine->plusDriver($driver);

            if($result)
                new Redirect("/{$driver->getPlate()}", TRUE);
            }



        }



}

?>
