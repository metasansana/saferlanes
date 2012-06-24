<?php

/**
 * timestamp May 12, 2012 9:24:52 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\net\http;
 *
 * Class for reading http values.
 *
 */

namespace callow\net\http;

use callow\util\Collection;

class MethodReader extends Collection
{

const POST = 1;

const GET =  2;

    public function __construct($method)
    {
        if($method === MethodReader::POST)
        $members = &$_POST;

        if($method === MethodReader::GET)
        $members = &$_GET;

        parent::__construct($members);

    }




}

?>
