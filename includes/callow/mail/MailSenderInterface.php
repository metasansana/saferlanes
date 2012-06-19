<?php

/**
 * timestamp Jun 19, 2012 5:25:26 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mail
 *
 * Interface for classes that send mail messages
 *
 */

namespace callow\mail;

interface MailSenderInterface
{
    
    public function send();

    public function acceptMail(Mail $mail);

}

?>
