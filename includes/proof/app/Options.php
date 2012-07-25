<?php
namespace proof\app;
/**
 * timestamp May 26, 2012 10:40:23 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\app
 *
 * Creates options from the current url.
 *
 */
use proof\util\AbstractListing;

class Options extends AbstractListing
{

    final public function __construct()
    {

        $url = urldecode($_SERVER['REQUEST_URI']);


        @$params = explode('/', $url);

        array_shift($params);

        if (empty($params[0]))
            array_shift($params);

        parent::__construct($params);

    }

}