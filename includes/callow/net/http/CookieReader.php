<?php

/**
 * timestamp May 14, 2012 9:34:11 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\net\http;
 *
 *  Wrapper class for the $_COOKIE array.
 *
 */

namespace callow\net\http;

class CookieReader
{

  public function __construct()
  {
      $this->data = &$_COOKIE;
  }



}

?>
