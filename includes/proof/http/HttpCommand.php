<?php

namespace proof\http;


/**
 * timestamp Jul 31, 2012 4:17:37 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 *  Sends an http header to the user's browser.
 *
 */
class HttpCommand implements OutboundHeader
{

    /**
     * The http command to be sent.
     * @var string $header
     * @access protected
     */
    protected $header;

    public function __construct($value)
    {

        $this->header = $value;

    }

    /**
     * Sends a previously set http header.
     * @param boolean $replace If FALSE, duplicate headers are allowed.
     * @return boolean    True if headers were not already sent false if otherwise.
     */
    public function send($replace=TRUE)
    {
        return header($this->header, $replace);

    }

}