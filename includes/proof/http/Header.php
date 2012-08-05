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
 *  Class for sending an http header to the user's browser.
 *
 */
class Header implements HttpResponse
{

    const E404 = 404;
    const E500 = 500;
    const M404 = "";
    const M500 = "500 Internal Server Error";

    /**
     * The http command to be sent.
     * @var string $header
     * @access protected
     */
    protected $text;

    /**
     * The status code of the header;
     * @var int $status
     */
    protected $status;

    public function __construct($text, $status = 200)
    {

        $this->text = $text;
        $this->status = $status;

    }

    /**
     * Optionally sets the status code for the header sent.
     * @param int $code
     */
    public function setStatus($code)
    {

        $this->status = $code;

        return $this;

    }

    /**
     *  Sets the text to be sent with the header.
     * @param string $text
     * @return \proof\http\Header
     */
    public function setText($text)
    {

        $this->text = $text;

        return $this;

    }

    /**
     * Sends a previously set http header.
     * @param boolean $overwrite If FALSE, duplicate headers are allowed.
     * @return boolean|NULL    False if output was sent already, NULL if on cli
     */
    public function send($overwrite = TRUE)
    {
        return header($this->text, $overwrite, $this->status);

    }

}