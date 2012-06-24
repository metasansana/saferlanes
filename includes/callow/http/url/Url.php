<?php

/**
 * timestamp Jun 24, 2012 1:53:51 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\http\url
 *
 * Represents a non scheme specific url.
 *
 * @todo add getters and setters
 *
 *
 */

namespace callow\http\url;

use callow\framework\String;

class Url extends String
{

    /**
     * An array containing key value pairs for the structure of the url
     * @var array $parts
     */
 private $parts = array();



     public function __construct($url=NULL)
    {

         if($url)
             $this->set ($url);

    }

    /**
     * Sets the url.
     * @param string $url
     * @return \callow\http\Url
     * @throws MalFormedUrlException
     */
    public function set($url)
    {
        if(!filter_var($url, FILTER_VALIDATE_URL))
        {
                throw new MalFormedUrlException();
                return;
        }

        $this->value = $url;

        $this->parts = parse_url($url);

        return $this;

    }


    /**
     * Returns a UrlParameters object containing the query part of this url.
     * @return \callow\http\url\UrlParameters
     */
    public function getParameters()
    {
        return new UrlParameters($this->parts['query']);
    }

}

?>
