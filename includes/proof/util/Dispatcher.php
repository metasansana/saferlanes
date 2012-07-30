<?php
namespace proof\util;
/**
 * timestamp Jul 30, 2012 4:10:51 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 * Interface for dispatching events to other classes.
 *
 */
interface Dispatcher
{
    
    public function getListeners();

    public function flush();

}