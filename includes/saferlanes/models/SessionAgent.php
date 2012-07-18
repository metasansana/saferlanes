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
use callow\util\AbstractAlerter;
use callow\util\Warning;

class SessionAgent extends AbstractAlerter
{


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


    public function generateToken($label)
    {

        $token = RandomToken::generate();

        $this->session->add($label, $token);

        return $token;


    }

    public function verify($label, $match)
    {

        if($this->session->contains($label))
        {

            if($this->session->get($label) === $match)
            {
                return TRUE;
            }
            else
            {

                $warn = new Warning($this, AlertCodes::REQUEST_CHECK_FAILED, "Possible CSRF attempt!");

                $this->notify($warn);

                return FALSE;
            }

        }
        else
        {

            $warn = new Warning($this, AlertCodes::COOKIES_REQUIRED, "Session object is not populated");

            $this->notify($warn);

            return FALSE;

        }



    }







}

?>
