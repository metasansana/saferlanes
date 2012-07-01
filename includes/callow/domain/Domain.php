<?php

/**
 * timestamp May 29, 2012 5:27:06 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\domain
 *
 *  Interface for objects that represent data domains.
 */

namespace callow\domain;

interface Domain
{

    public function isProperty($property);

    public function toArray();

    public function get();

    public function set(array $list);



}

?>
