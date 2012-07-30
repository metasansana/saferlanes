<?php
namespace proof\http;
/**
 * timestamp Jul 28, 2012 2:36:38 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 * Class used to send http responses to the user's browsers.
 *
 */
use proof\types\String;

class HttpReply
{


    /**
     * Sends a redirect header to the browser
     * @param String $uri The uri/url to redirect to.
     * @return boolean
     */
    public function redirect(String $uri)
    {

        return header("Location: $uri");


    }



}