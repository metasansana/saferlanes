<?php

/**
 * timestamp Jul 10, 2012 6:37:38 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\views
 *
 *
 */

namespace saferlanes\views;

use callow\html\Widget;

class AlertBar extends Widget
{

public function __toString()
{

    return "<div class ='alert'>{$this->html}</div>";
    
}

}

?>
