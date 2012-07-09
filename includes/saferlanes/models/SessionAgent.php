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

use callow\app\AbstractWindow;
use callow\core\Driver;
use callow\http\Session;
use callow\security\RandomToken;

class SessionAgent extends AbstractObservableModel
{

    const NO_COOKIE = 'You must have cookies enabled to continue!';

    const CSRF = 'This does not appear to be a valid request! Please try again.';

    const LABEL = 'msg';



    /**
     * Internal reference to the current session.
     * @var Session $session
     * @access private
     */
    private $session;

    public function __construct(AbstractWindow &$win)
    {

        parent::__construct($win);

        $this->session = new Session();

    }


    public function enableVoting($plate_number)
    {

        $request = array();

        $this->session->regenerate(TRUE);

        $token = RandomToken::generate();

        $this->session->add('vote_key', $token);

        $request['plus_link'] =  "/vote/plus/$plate_number/$token";

        $request['minus_link'] =  "/vote/minus/$plate_number/$token";

        $this->sendRequest($request);

        return $this;


    }

    public function verifyRequest($key, $value)
    {

        if($this->session->hasIndex($key))
        {

            if($this->session->get($key) === $value)
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

    private function sendRequest($request)
    {
        $this->fire(new UpdateRequest($request));
    }


}

?>
