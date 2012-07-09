<?php

/**
 * timestamp Jul 9, 2012 4:55:45 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  Event fired when an internal model needs to change  ui values.
 *
 */

namespace saferlanes\models;

use callow\event\Event;

class UpdateRequest extends Event
{

    /**
     * List of changes to be made
     * @var array $changes
     * @access private
     */
    private $changes = array();

    public function __construct(array $changes)
    {

        $this->changes = $changes;

    }

    public function toArray()
    {
        return $this->changes;
    }

}

?>
