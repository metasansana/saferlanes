<?php

/**
 * timestamp Jun 24, 2012 1:53:51 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\net
 *
 * Represents a non scheme specific url.
 *
 * @todo add getters and setters
 *
 *
 */

namespace callow\net;

class URL
{

    /**
     * A string representation of the url.
     * @var string $url
     * @access private
     */
    private $url;


    public function __construct($url = NULL)
    {

        if ($url)
            $this->set($url);

    }


    private function parse($flag=NULL)
    {

        if($flag)
        {
            $result = parse_url($this->url);
        }
        else
        {
            $result = parse_url($this->url, $flag);
        }

        return  $result;
    }

    /**
     * Sets the mandatory part of a url.
     * @param string $url
     * @return \callow\http\Url
     * @throws MalFormedUrlException
     */
    public function set($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL))
        {
            throw new MalFormedURLException();
            return;
        }

        $this->url = $url;

        return $this;

    }

    /**
     * Returns the a Query object based on the query string of the url.
     * @return \callow\net\Query|null
     */

    public function getQuery()
    {
        $qstring = $this->parse(PHP_URL_QUERY);

        if(is_string($qstring))
        {
            return new URLQuery($qstring);
        }

        return NULL;

    }

    /**
     *Returns the parts of this url as a set of key value paired strings.
     * @return array
     */
    public function toArray()
    {
        return $this->parse();

    }

    public function __toString()
    {
           return $this->url;
    }

}

?>
