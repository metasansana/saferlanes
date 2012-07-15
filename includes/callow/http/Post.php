<?php

/**
 * timestamp Jun 28, 2012 10:15:46 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\http
 *
 *
 */

namespace callow\http;
use callow\util\Collection;

class Post extends Collection
{


    public function __construct()
    {
        parent::__construct($_POST);
    }


}

?>
