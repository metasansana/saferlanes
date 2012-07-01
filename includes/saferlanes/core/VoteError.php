<?php

/**
 * timestamp Jul 1, 2012 1:43:20 AM
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

class VoteError extends Error
{

public function __toString()
    {
        return "Something broke! : (";
    }

}

?>
