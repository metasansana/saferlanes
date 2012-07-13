<?php

/**
 * timestamp Jul 10, 2012 8:30:04 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 *
 */

namespace saferlanes\models;

use callow\event\UserNotice;

class NewSessionKeyNotice extends UserNotice
{

    /**
     *
     * @var
     * @access protected
     */
    private $key;

    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function  getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

}

?>
