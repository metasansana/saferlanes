<?php

/**
 * timestamp Jul 10, 2012 4:49:01 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\event;
 *
 *  Interface for all Event classes.
 *
 */

namespace callow\event;

interface Event
{

    public function typeOf($class_name);

    public function getSource();

    public function __toString();



}

?>
