<?php
namespace proof\http;
/**
 * timestamp Jul 31, 2012 4:14:43 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 *  Interface for sending http headers to a browser.
 *
 */
interface OutboundHeader
{

    public function send($replace=TRUE);

}