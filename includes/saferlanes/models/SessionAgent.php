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

class SessionAgent
{

    /**
     * Reference to the current window object.
     * @var AbstractWindow $win
     * @access private
     */
    private $win;

    public function __construct(AbstractWindow &$win)
    {

        $this->win =$win;

    }

    public function enableVoting(Driver &$driver)
    {
        $session = new Session();

        $session->regenerate(TRUE);

        $token = RandomToken::generate();

        $session->add($token, 'vote_key');

        $this->screen->add($driver->getPlate(), 'plate');

        $this->screen->add($driver->getTimeStamp(), 'timestamp');

        $plus_link =
        "/vote/plus/{$driver->getPlate()}/$token";

        $minus_link =
        "/vote/minus/{$driver->getPlate()}/$token";

        $this->win->insertHTML( 'plus_link', $plus_link);

        $this->win>insertHTML('minus_link', $minus_link);


    }


}

?>
