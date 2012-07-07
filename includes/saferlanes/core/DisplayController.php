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

use callow\mvc\Controller;
use callow\http\Session;
use callow\http\Redirect;
use callow\gui\Screen;
use callow\dbase\DatabaseMapper;
use callow\dbase\ExecutionFailedException;
use callow\dbase\NullResultSetException;
use callow\domain\BadValueException;
use saferlanes\tools\DriverSQLGenerator;
use saferlanes\tools\ConnectionFactory;
use saferlanes\core\domain\FormatedDriver;
use saferlanes\gui\ValidationErrorResponse;
use saferlanes\gui\DriverPrinter;
use saferlanes\gui\NoticeBar;
use saferlanes\gui\SearchForm;

class DisplayController extends Controller
{

    public function main()
    {

        if(count($this->params) > 1)
            new Redirect('/', TRUE);

        $screen = new Screen();

        if($this->params[0])
        {

            $driver = new FormatedDriver();

            try
            {

                $driver->setPlate($this->params[0]);

                $con = ConnectionFactory::getConnection();

                $code = new DriverSQLGenerator();

                $mapper = new DatabaseMapper($driver, $code->getLoadCode(), $con);

                $mapper->load();

                //ideal code

                $auth = new Authenticator();
                try
                {
                    $auth->verify();  //Is the user already verified?
                    //@todo add vote button generation here
                }
                catch (AuthenticationRequiredException $exc)
                {

                    $dialog = Widgets::getAuthDialog();  //Widgets is a factory method in sl.
                    $screen->add($dialog, 'auth');  //Dialog should be forced into a string. Screen should therefore accept any object but force it into a string.
                    exit();  //exit because php does not have a finally block.
                }

                //If here, the user should be auth otherwise he would see the driver as normal with no vote option
                //instead a facebook button.



                //End

                $printer = new DriverPrinter($screen);

                $printer->printDriver($driver);  //@todo take out vote token generation and put into own class?

                $screen->setTemplate('display');  //@todo the screen needs a clearer interface

            }
            catch (BadValueException $iexc)
            {
                //Validation failed!

                new SearchForm($screen);

                $response = new ValidationErrorResponse($screen);

                $response->setResponse($iexc);

            }
            catch (NullResultSetException $nexc)
            {
                //The driver does not exist!

                new SearchForm($screen);

                $notice = new NoticeBar($screen);

                $notice->setNotice('Sorry, that number is not in the database yet. Use <a href="/post">this</a> link to add it.');

            }
            catch (ExecutionFailedException $eexc)
            {

                new SearchForm($screen);

                $notice = new NoticeBar($screen);

                $notice->setNotice('Whoops! Looks like saferlanes just broke!');

            }
            catch (\PDOException $pexc)
            {

                  new SearchForm($screen);

                $notice = new NoticeBar($screen);

                $notice->setNotice('Noooooooo! The service is down!! Come back later!');

            }

        }
        else
        {
            new SearchForm($screen);
        }


    }

}

?>
