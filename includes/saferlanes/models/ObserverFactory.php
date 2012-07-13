<?php

/**
 * timestamp Jul 9, 2012 9:38:13 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */

namespace saferlanes\models;

use callow\event\Observers;
use callow\event\Observer;
use saferlanes\models\WebPage;

class ObserverFactory
{

    public function generate(Observer $o  = NULL)
    {

        $factory = new Observers;

        if($o)
            $factory->addObserver ($o);

        return $factory;

    }
}