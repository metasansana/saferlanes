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

use callow\util\MemberNotFoundException;
use callow\framework\String;
use callow\mvc\Controller;
use callow\gui\Screen;
use callow\http\Session;
use callow \http\MethodReader;
use callow\http\Redirect;
use callow\dbase\DatabaseMapper;
use callow\dbase\ExecutionFailedException;
use callow\dbase\DuplicateRecordException;
use callow\domain\BadValueException;
use saferlanes\tools\DriverSQLGenerator;
use saferlanes\tools\ConnectionFactory;
use saferlanes\core\domain\Driver;
use saferlanes\gui\NoticeBar;
use saferlanes\gui\PostForm;
use saferlanes\gui\ValidationErrorResponse;


class PostController extends Controller
{

    public function main()
    {


        $reader = new MethodReader(MethodReader::POST);

        $screen = new Screen();

        $form = new PostForm($screen);

        $valid_session = FALSE;

        if ($reader->hasMember('plate'))
        {

            try
            {
                //Do the csrf check.

                $session = new Session();

                $btoken = new String($reader->get('csrf_token'));

                $stoken = new String($session->get('csrf_token'));

                $valid_session = $btoken->equals($stoken);


                if (!$valid_session)
                {
                    //We cannot continue.
                    $notice = new NoticeBar($screen);

                    $notice->setNotice("This session does not appear valid!");
                }
                else
                {
                    //Post the driver


                    $driver = new Driver();

                    $driver->setPlate($reader->get('plate'));

                    $driver->setTimeStamp();

                    $con = ConnectionFactory::getConnection();

                    $code = new DriverSQLGenerator();

                    $mapper = new DatabaseMapper($driver, $code->getSaveCode(), $con);

                    $mapper->save();

                    new Redirect('/' . $driver->getPlate(), TRUE);
                }
            }
            catch (MemberNotFoundException $mexc)
            {

                $notice = new NoticeBar($screen);

                $notice->setNotice("We can't go any further! We need cookies enabled, do you have any?");

                $form->init();
            }
            catch (BadValueException $iexc)
            {
                //Validation failed!

                $response = new ValidationErrorResponse($screen);

                $response->setResponse($iexc);

                $form->init();
            }
            catch (DuplicateRecordException $eexc)
            {
                //Error in executing the SQL code.
                //we reach here due to syntax or duplication.

                $notice = new NoticeBar($screen);

                $notice->setNotice("Hey! That' driver is already in the database!");

                $form->init();
            }
            catch (ExecutionFailedException $eexc)
            {

                $notice = new NoticeBar($screen);

                $notice->setNotice('Whoops! Looks like saferlanes just broke!');
                
            }
            catch (\PDOException $pexc)
            {

                $notice = new NoticeBar($screen);

                $notice->setNotice('Noooooooo! The service is down!! Come back later!');
            }
        }
        else
        {

            $form->init();
        }

    }

}

?>
