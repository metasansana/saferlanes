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

use callow\event\AbstractObservable;
use callow\event\Subscriber;

abstract class AbstractObservableModel extends AbstractObservable
{

     public  function __construct(Observer &$w =NULL)
    {
    $this->register($w);
    }


}

?>
