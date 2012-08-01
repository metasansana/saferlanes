<?php
namespace proof\webapp;
/**
 * timestamp Jul 31, 2012 8:25:12 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Event fired when a GET request is detected.
 *
 */
use proof\util\ArrayList;

class GetRequestEvent extends BrowserRequestEvent
{

     public function __construct(Browser $browser, ArrayList $get)
    {
        parent::__constuct($browser, $get);
    }

}