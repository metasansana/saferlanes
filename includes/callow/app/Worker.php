<?php

/**
 * timestamp Jul 14, 2012 4:50:17 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app;
 *
 *  Classes implementing Worker are used to perform the 'model' work of an application.
 *  These classes should push InternalEvent classes such as Signals, to allow listening classes
 *   to jump into action.
 *
 */

namespace callow\app;

interface Worker
{

    public function register(AlertListener &$iel);


}

