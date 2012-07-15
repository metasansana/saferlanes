<?php

/**
 * timestamp Jul 14, 2012 4:50:17 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app;
 *
 *  Interface for classes that function simillar to the 'model' in mvc.
 *
 */

namespace callow\app;

interface Worker
{

    public function setInternalEventListener(InternalEventListener &$iel);

    public function setBrowserUpdateListener(BrowserUpdateListener &$bul);

}

