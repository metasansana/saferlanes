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

namespace saferlanes\views;

use callow\html\Widget;

class MessageBox extends Widget
{

    public function __construct($message, $type='notice')
    {

        if ($message)
            $this->setMessage($message, $type);

    }

    public function setMessage($msg, $class)
    {
        $msg = (string) $msg;

        $this->html = "<div class='$class'>$msg</div>";
        return $this;

    }

}

?>
