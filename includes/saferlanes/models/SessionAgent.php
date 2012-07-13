<?php

/**
 * timestamp Jul 8, 2012 9:35:31 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  This class contains methods for managing sessions within the application.
 *
 */

namespace saferlanes\models;

use callow\core\Driver;
use callow\http\Session;
use callow\security\RandomToken;
use callow\event\AbstractObservable;
use callow\event\UserNotice;

class SessionAgent extends AbstractObservable
{

    const NO_COOKIE = 'You must have cookies enabled to continue!';

    const CSRF = 'This does not appear to be a valid request! Please try again.';

    /**
     * Internal reference to the current session.
     * @var Session $session
     * @access private
     */
    private $session;

    public function __construct()
    {

        $this->session = new Session();

        $this->session->regenerate(TRUE);

    }


    public function generateToken()
    {

        $token = RandomToken::generate();

        $this->add('vote_key', $token);

        return $token;


    }

    public function verify($session_label, $desired_value)
    {

        if($this->session->hasIndex($session_label))
        {

            if($this->session->get($session_label) === $desired_value)
            {
                return TRUE;
            }
            else
            {
                $request = array(SessionAgent::LABEL, SessionAgent::CSRF);
                $this->sendRequest($request);

                return FALSE;
            }

        }
        else
        {

            $request = array(SessionAgent::LABEL, SessionAgent::NO_COOKIE);
            $this->sendRequest($request);

            return FALSE;

        }



    }

public function add($key,  $value)
{

    $this->session->add($key, $value);

    $notice  = new NewSessionKeyNotice($key, $value);

    $this->fire($notice);

    return $this;



}

}

?>
