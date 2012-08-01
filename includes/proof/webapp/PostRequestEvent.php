<?php
namespace proof\webapp;

/**
 * timestamp Jul 31, 2012 7:57:56 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Event fired when a POST request is detected.
 *
 */
use proof\util\Map;

class PostRequestEvent extends BrowserRequestEvent
{

    public function __construct(Browser $browser, Map $get)
    {
        parent::__constuct($browser, $get);
    }

}