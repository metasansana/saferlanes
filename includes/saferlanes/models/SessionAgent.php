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


    public function enableVoting($plate_number)
    {
        $session = new Session();

        $session->regenerate(TRUE);

        $token = RandomToken::generate();

        $session->add('vote_key', $token);

        $plus_link =  "/vote/plus/$plate_number/$token";

        $minus_link =  "/vote/minus/$plate_number/$token";

        $this->win->insertHTML( 'plus_link', $plus_link);

        $this->win->insertHTML('minus_link', $minus_link);

        return $this;


    }


}

?>
