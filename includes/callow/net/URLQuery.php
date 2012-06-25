<?php

/**
 * timestamp Jun 24, 2012 2:02:48 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\net
 *
 *  Wrapper object for the query part of a url
 *  @todo enforce some checking to ensure $members are valid strings.
 *
 */

namespace callow\net;

use callow\util\Collection;

class URLQuery extends Collection
{

    public function __construct($query_string= NULL)
    {

        if($query_string)
            $this->set ($query_string);

    }


    public function add($member, $index)
    {

        return parent::add($member, $index);

    }

    /**
     * Parses a string of url parameters.
     * @param string $query_string
     * @return \callow\net\URLQuery
     */
    public function set($query_string)
    {

       $query_string = (string)$query_string;

       $query_string = str_replace('?', '&', $query_string);

       parse_str($query_string, $this->members);

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
