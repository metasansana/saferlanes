<?php

/**
 * timestamp Jun 9, 2012 11:50:58 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\gui
 *
 * Class that prints out a driver to the screen.
 *
 */

namespace saferlanes\gui;

use callow\gui\ScreenWriter;
use callow\http\Session;
use callow\security\RandomToken;
use saferlanes\core\domain\Driver;

class DriverPrinter extends ScreenWriter
{


    /**
     * Prints out a formatted driver to the screen.
     * @param Driver $driver
     * @return type
     */
    public function printDriver(Driver &$driver)
    {

        $session = new Session();

        $session->regenerate(TRUE);

        $token = RandomToken::generate();

        $session->add($token, 'vote_key');

        $this->screen->add($driver->getPlate(), 'plate');

        $this->screen->add($driver->getTimeStamp(), 'timestamp');

        $likes = $driver->getPlus();

        $fails = $driver->getMinus();

        if($likes > $fails)
        {
            $image = "happy";
        }
        elseif ($likes  == $fails)
        {
            $image = "unsure";
        }
        else
        {
            $image = "sad";
        }

        $plus_link =
        "/vote/plus/{$driver->getPlate()}/$token";

        $minus_link =
        "/vote/minus/{$driver->getPlate()}/$token";

        $this->screen->add($likes, 'likes');

        $this->screen->add($fails, 'fails');

        $this->screen->add($plus_link, 'plus_link');

        $this->screen->add($minus_link, 'minus_link');

        $this->screen->add($image, 'image');

        return;
    }

}

?>
