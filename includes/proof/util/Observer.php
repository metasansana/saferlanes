<?php
namespace proof\util;
/**
 * timestamp Jul 25, 2012 1:15:38 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 * Interface for the Observer in the Observer pattern.
 *
 *
 */
interface  Observer
{

    public function update(Observable $o);

}