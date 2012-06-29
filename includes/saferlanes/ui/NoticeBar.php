<?php

/**
 * timestamp Jun 9, 2012 12:50:26 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\ui
 *
 *  Class for sending messages to the screen after an operation.
 *
 */

namespace saferlanes\gui;

use callow\ui\Widget;

class NoticeBar extends Widget
{

    public function __construct($notice = NULL)
    {

        if($notice)
            $this->setNotice((string)$notice);
}

public function setNotice($msg)
{
    if(is_string($msg))
    {

        $msg = "<div class='notice'>$msg</div>";
        return $this;
    }

}

}

?>
