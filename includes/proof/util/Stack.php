<?php
namespace proof\util;
/**
 * timestamp Jul 25, 2012 11:45:17 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Class that allows a Listing to behave like a stack
 *
 */

class Stack  extends AbstractListing
{

    public function __construct()
    {

    }


    public function push($item)
    {

        return parent::add($item);

    }

    public function pop()
    {

        if($this->isEmpty())
            throw new StackEmptyException;

        return array_pop($this->items);

    }

}