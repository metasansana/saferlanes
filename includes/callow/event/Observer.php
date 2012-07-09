<?php

/**
 * timestamp May 8, 2012 4:51:22 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\event
 *
 *  Interface of classes wishing to suscribe to events.
 *
 */

namespace callow\event;

interface Observer
{


    public function notify(Event &$event);

}

?>
