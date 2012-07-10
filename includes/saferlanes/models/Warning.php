<?php

/**
 * timestamp Jul 10, 2012 5:02:45 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */

namespace saferlanes\models;

use callow\event\AbstractEvent;

class Warning extends AbstractEvent
{



    public function __toString()
    {
        return $this->message;
    }}

?>
