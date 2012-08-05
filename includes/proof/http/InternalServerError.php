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
 *  Convience class used to send a error 500 message.
 *
 */
class InternalServerError extends Header
{

    public function __construct($flag = FALSE)
    {

        $this->status = parent::E500;
        $this->text = parent::M500;
        $this->flag = $flag;

    }

}