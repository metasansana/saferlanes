<?php

/**
 * timestamp Jul 14, 2012 4:45:41 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *
 */

namespace callow\app;

use callow\util\AbstractEvent;
use callow\util\Collection;

class BrowserUpdate extends AbstractEvent
{

    /**
     *
     * @var Collection $changes
     * @access protected
     */
    private $changes;

    public function __construct(\stdClass &$src, array $changes = NULL)
    {
        if($changes)
            $this->changes = new Collection($changes);

        parent::__construct($src);

    }

    public function change($label, $code)
    {
        if(!$this->changes)
            $this->changes = new Collection();

        $this->changes->add($label, (string)$code);

        return $this;
    }

    /**
     * Returns an ArrayIterator containing the updates.
     * @return ArrayIterator 
     */
    public function getChanges()
    {
        return $this->changes->getIterator();
    }

}

?>
