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

class SessionAgent extends AbstractWindowModel
{

    private $session;

    public function __construct(AbstractWindow &$win)
    {

        parent::__construct($win);

        $this->session = new Session();

    }


    public function enableVoting($plate_number)
    {

        $this->session->regenerate(TRUE);

        $token = RandomToken::generate();

        $this->session->add('vote_key', $token);

        $plus_link =  "/vote/plus/$plate_number/$token";

        $minus_link =  "/vote/minus/$plate_number/$token";

        $this->win->insertHTML( 'plus_link', $plus_link);

        $this->win->insertHTML('minus_link', $minus_link);

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
                $this->win->insertHTML('system', "<div class='notice'>Your vote appears suspicous and has been ignored!</div>");
                return FALSE;
            }

        }
        else
        {
            $this->win->insertHTML('system', "<div class='notice'>You must have cookies enabled to vote!</div>");

            return FALSE;

        }


    }


}

?>
