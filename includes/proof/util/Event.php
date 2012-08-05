<?php
namespace proof\util;
/**
 * timestamp Jul 28, 2012 11:26:37 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Events are methods for passing messages between classes that do not directly know about each
 *  other.
 *
 */

interface Event
{

    public function getSource();
    

}