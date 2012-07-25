<?php
namespace proof\hwk;
/**
 * timestamp Jul 22, 2012 6:49:03 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk
 *
 *  Iterface for view providers of a web application.
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

interface ViewPort
{

    /**
     * Attempts to send the html output to a user's browser.
     */
    public function show();

    /**
     *Indicates whether output has been sent already or not.
     */
    public function showed();


}