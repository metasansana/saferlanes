<?php

/**
 * timestamp Jun 9, 2012 12:50:26 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\gui
 *
 *  Class for sending messages to the screen after an operation.
 *
 */

namespace saferlanes\gui;

use callow\gui\ScreenWriter;

class NoticeBar extends ScreenWriter
{

public function setNotice($msg)
{
    if(is_string($msg))
    {

        $msg = "<div class='notice'>$msg</div>";
        $this->screen->add($msg, 'msg');


        return $this;
    }

}

}

?>
