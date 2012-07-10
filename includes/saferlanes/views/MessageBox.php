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

    private $type;

    public function __construct($message, $type='notice')
    {

        $this->type = $type;

        parent::__construct((string)$message);

        }

    public function __toString()
    {


        return "<div class='{$this->type}'>$this->html</div>";
        return $this;

    }

}

?>
