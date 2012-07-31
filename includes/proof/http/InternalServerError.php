<?php
namespace proof\http;
/**
 * timestamp Jul 31, 2012 5:16:32 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 *  Class used to send a error 500 message.
 *
 */
class InternalServerError extends HttpStatus
{

        /**
     * The code for the status
     * @var int $code
     * @access protected
     */
    protected $code = 500;

     /**
     * Message associated with the status.
     * @var string message
     * @access protected
     */
    protected $message = "500 Internal Server Error";

    public function __construct()
    {

    }

}