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
 *  Class providing  data about the current http request.
 * @todo incomplete class
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

class HttpRequest
{

    /**
     * Returns the type of method used for this request
     * @return string    The method used.
     */
    public function method()
    {

        return $_SERVER['REQUEST_METHOD'];

    }

    /**
     *  Returns the arguments passed as GET parameters.
     * @return \proof\util\Map    The arguments.
     */
    public function getArgs()
    {
        return new Map($_GET);

    }

    /**
     * Returns the path of this request.
     * @return string    The path of the request.
     */
    public function getPath()
    {
        return $_SERVER['REQUEST_URI'];

    }

    /**
     * Returns the an ArrayList of the current url's path.
     * @return \proof\util\ArrayList
     */
    public function getCleanPath()
    {

        $url = urldecode($this->getPath());

        @$params = explode('/', $url);

        array_shift($params);    //Drop the NULL member

        if (empty($params[0]))
            $params = array ();

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

        if ($this->method() === 'POST')
            return TRUE;

        return FALSE;

    }

    /**
     * Test for the GET request method.
     * @return boolean    True if the request method was GET, false if otherwise.
     */
    public function isGet()
    {
        if ($this->method() === 'GET')
            return TRUE;

        return FALSE;

    }

}