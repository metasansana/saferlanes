<?php

/**
 * timestamp Jun 9, 2012 12:50:26 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core;
 *
 *  Class for sending messages to the screen after an operation.
 *
 */

namespace saferlanes\html;

use callow\html\Widget;

class MessageBar extends Widget
{

    public function __construct($message, $type='notice')
    {

        if ($message)
            $this->setMessage($message, $type);

    }

    public function setMessage($msg, $type)
    {
        $msg = (string) $msg;

        $this->html = "<div class='$type'>$msg</div>";
        return $this;

    }

}

?>
