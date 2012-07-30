<?php
namespace proof\http;
/**
 * timestamp Jul 25, 2012 4:34:41 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Class that attempts to contain data about the current http request.
 * @todo incomplete class
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

class HttpRequest
{


    /**
     * Returns the an ArrayList of the current url's path.
     * @return \proof\util\ArrayList
     */
    public function getPaths()
    {

        $url = urldecode(@$_SERVER['REQUEST_URI']);

        @$params = explode('/', $url);

        array_shift($params);

        if (empty($params[0]))
            array_shift($params);

        return new ArrayList($params);

    }

    /**
     * Returns the $_POST variable as a Map.
     * @return \proof\util\Map
     */
    public function getPost()
    {
        return new Map($_POST);
    }

    /**
     * Test for the POST request method.
     * @return boolean    True if the request method was POST, false if otherwise.
     */
    public function isPost()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST')
            return TRUE;

        return FALSE;

    }

}