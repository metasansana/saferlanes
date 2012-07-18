<?php

/**
 * timestamp Jul 15, 2012 12:58:11 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package
 *
 *
 */

namespace callow\util;

class AbstractAlerter extends EventSource
{


    public function register(AlertListener $l)
    {
        parent::register($l);

        return $this;
    }

}

?>
