<?php

/**
 * timestamp May 26, 2012 10:40:23 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app;
 *
 *  This class creates parameters for the Application's Controllers
 *  based on the current uri.
 *
 */

namespace callow\app;

use callow\util\Collection;

class Options extends Collection
{

    final public function __construct()
    {

        $url = urldecode($_SERVER['REQUEST_URI']);


        @$params = explode('/', $url);

        array_shift($params);

        if (empty($params[0]))
            array_shift($params);

        parent::__construc($params);

    }

}

?>
