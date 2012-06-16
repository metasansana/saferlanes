<?php

/**
 * timestamp May 30, 2012 1:29:34 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\domain;
 *
 * Interface for Domain object validation
 */

namespace callow\domain;

interface Validator
{

    public function isValid($propery, $value);

   

}

?>
