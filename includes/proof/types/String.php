<?php
namespace proof\types;
/**
 * timestamp Jul 23, 2012 5:06:46 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\types
 *
 *  Class for simulating a String type.
 * @todo Incomplete class
 *
 */
class String extends Type
{

    public function __construct($value)
    {
        parent::__construct((string)($value));

    }


}