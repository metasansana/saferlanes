<?php

/**
 * timestamp Jun 9, 2012 11:08:53 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\gui
 *
 * Class representing the state of the screen when a validation error occurs.
 *
 */

namespace saferlanes\gui;

use callow\gui\ScreenWriter;

use callow\domain\BadValueException;

class ValidationErrorResponse extends ScreenWriter
{


    /**
     * Sets the message the user sees on a validaiton error.
     * 
     * @param BadValueException $exc
     * @return \saferlanes\gui\ValidationErrorResponse
     */
    public function setResponse(BadValueException $exc)
    {


        $msg = "<div class='error'>{$exc->getMessage()}</div>";
        $this->screen->add($msg, $exc->getPropertyName());


        return $this;

    }


}

?>
