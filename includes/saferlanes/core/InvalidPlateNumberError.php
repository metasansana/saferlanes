<?php

/**
 * timestamp Jun 29, 2012 11:34:16 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core
 *
 *
 */

namespace saferlanes\core;

use callow\galaxy\Error;

class InvalidPlateNumberError extends  Error
{

    public function __toString()
    {
        return "Whoops! That isn't a valid plate number!";
    }

}

?>