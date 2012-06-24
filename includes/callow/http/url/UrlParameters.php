<?php

/**
 * timestamp Jun 24, 2012 2:02:48 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\http\url
 *
 *  Wrapper object for the query part of a url
 *  @todo enforce some checking to ensure $members are valid strings.
 *
 */

namespace callow\http\url;

use callow\util\Collection;

class UrlParameters extends Collection
{

    public function __construct($url= NULL)
    {

        if($url)
            $this->parse ($url);

    }


    public function add($member, $index)
    {

        return parent::add($member, $index);

    }

    public function parse($url)
    {

       $url = parse_url((string)$url, PHP_URL_QUERY);

       $url = str_replace('?', '&', $url);

       $this->members = parse_str($url);

       return $this;

    }

    public function __toString()
    {
        $count = 0;
        $mark = '?';
        $query = '';

        foreach ($this->members as $key=>&$value)
        {
            if(!$count === 0)
               $mark = '&';

            $query = "$mark$key=$value";

            $count++;

        }

        return $query;
    }

}

?>
