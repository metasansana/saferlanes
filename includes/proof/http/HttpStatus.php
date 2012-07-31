<?php
namespace proof\http;
/**
 * timestamp Jul 31, 2012 4:47:18 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 *  Class for changing the http status to one of the commonly used ones.
 *
 */

class HttpStatus implements OutboundHeader
{

    /**
     * The code for the status
     * @var int $code
     * @access protected
     */
    protected $code;

     /**
     * Message associated with the status.
     * @var string message
     * @access protected
     */
    protected $message;


    public function __construct($code, $message)
    {

        $this->code = $code;
        $this->message = $message;

    }

    public function send($replace=TRUE)
    {

        return header($this->message, $replace, $this->code);

    }

}