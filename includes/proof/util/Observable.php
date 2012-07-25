<?php
namespace proof\util;
/**
 * timestamp Jul 25, 2012 1:09:25 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 * Interface to the Observer pattern.
 *
 */
interface Observable
{

    public function attachObserver(Observer $o);

    public function getObservers();

    public function notify();




}