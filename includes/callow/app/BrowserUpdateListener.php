<?php

/**
 * timestamp Jul 14, 2012 4:42:41 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  Interface for all classes intereseted in accepting browser updates.
 *
 */

namespace callow\app;

use callow\util\EventListener;

interface BrowserUpdateListener extends EventListener
{

    public function update(BrowserUpdate $e);

}

?>
