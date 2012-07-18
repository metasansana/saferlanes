<?php

/**
 * timestamp Jul 15, 2012 12:58:43 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 */

namespace callow\util;

interface Alerter
{

    public function register(Alert $e);

}

?>
