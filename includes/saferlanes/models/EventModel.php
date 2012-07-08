<?php

/**
 * timestamp Jul 7, 2012 10:46:42 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 *  Parent class for all model type classes that fire events.
 *
 */

namespace saferlanes\models;

use callow\event\AbstractEventHost;
use callow\event\Subscriber;

abstract class AbstractEventModel extends AbstractEventHost
{

     public  function __construct(Subscriber &$w =NULL)
    {
    $this->register($w);
    }


}

?>
