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

use callow\event\Event;

class Warning implements Event
{

    /**
     *
     * @var
     * @access protected
     */
    private $message;

    public function __construct($message)
    {
        $this->message = (string) $message;
    }

    public function __toString()
    {
        return $this->message;
    }

}

?>
