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

use callow\util\MemberNotFoundException;
use callow\framework\String;
use callow\mvc\Controller;
use callow\gui\Screen;
use callow\http\Session;
use callow \http\MethodReader;
use callow\http\Redirect;
use callow\dbase\DatabaseMapper;
use callow\dbase\ExecutionFailedException;
use callow\domain\InvalidPropertyException;
use saferlanes\tools\DriverSQLGenerator;
use saferlanes\tools\MinusSQLGenerator;
use saferlanes\tools\ConnectionFactory;
use saferlanes\core\domain\Driver;
use callow\dbase\IncompleteStatementException;
use saferlanes\gui\NoticeBar;


class VoteController extends Controller
{

    public function main()
    {

        $session = new Session();

        $screen = new Screen();

        $screen->setTemplate('vote');


        if(!$session->hasMember('vote_key'))
        {

            $notice = new NoticeBar($screen);

            $notice->setNotice("Hey! You need cookies enabled to vote!");

            exit();

        }

        try
        {

        $stoken = new String($session->get('vote_key'));

        $btoken = new String($this->params[2]);

        $valid_vote = ($stoken->equals($btoken)) ?TRUE : FALSE;

        }
        catch (MemberNotFoundException $mexc)
        {

            new Redirect('/', TRUE);

        }

        if (!$valid_vote)
        {

            $notice = new NoticeBar($screen);

            $notice->setNotice("This vote does not appear valid!");
        }
        else
        {

            if ($this->params[0] === 'plus')
            {
                $code = new SQLTemplates();
            }
            elseif ($this->params[0] === 'minus')
            {
                $code = new MinusSQLGenerator();
            }
            else
            {
                new Redirect('/', TRUE);
            }

            try
            {

                $driver = new Driver();

                $driver->setPlate($this->params[1]);

                $con = ConnectionFactory::getConnection();

                $mapper = new DatabaseMapper($driver, $code->getPlusVote(), $con);

                $mapper->edit();

                new Redirect("/" . $driver->getPlate(), TRUE);

            }
            catch (BadValueException $iexc)
            {

                //Validation failed!
                new Redirect("/" . $driver->getPlate(), TRUE);
            }
            catch (IncompleteStatementException $inexc)
            {
                die ('drive no exits!'); ///@todo wtf?
            }
            catch (ExecutionFailedException $eexc)
            {

                //Error in executing the SQL code.
                //we reach here due to syntax.
                new Redirect("/" . $driver->getPlate(), TRUE);
            }
        }

    }

}

?>
