<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 5:28:31 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Parent class of all browser events.
 *
 */
use proof\util\AbstractEvent;

abstract class BrowserEvent extends AbstractEvent
{

    public function __constuct(Browser $brwser)
    {
        parent::__construct($brwser);

    }

}