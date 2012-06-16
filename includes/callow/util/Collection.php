<?php

/**
 * timestamp May 30, 2012 4:35:24 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *
 */

namespace callow\util;


class Collection implements CollectionInterface
{

    /**
     * Stores the members of this collection.
     * @var array members
     * @access protected
     */
    protected $members = array ();

    public function __construct(array &$members = NULL)
    {
        if ($members)
            $this->members = $members;

    }

    public function add($member, $index = NULL)
    {
        if ($index)
        {
            $this->members[$index] = $member;
        }
        else
        {
            $this->members[] = $member;
        }

        return $this;

    }

    public function remove($index)
    {
        unset($this->members[$index]);

        return $this;

    }

    public function getIterator()
    {

    }

     public function get($index)
    {
        if(array_key_exists($index, $this->members))
                return $this->members[$index];

        throw new MemberNotFoundException($index);

        return FALSE;

    }

    public function count()
    {
        return count($this->members);

    }

    public function toArray()
    {
        return $this->members;

    }

    public function hasIndex($index)
    {
        return array_key_exists($index, $this->members);
    }

    public function hasMember($index)
    {
        $result = isset($this->members[$index]) ? TRUE : FALSE;

        return $result;
    }

}

?>
