<?php

/**
 * timestamp Jun 19, 2012 5:11:39 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mail
 *
 *  Sends an email message.
 *
 */

namespace callow\mail;

class MailSender implements MailSenderInterface
{

    /**
     * The message this sender is to send.
     * @var Mail $mail
     * @access private
     */
    private  $mail;

    public function __construct(Mail $mail = NULL)
    {

        if($mail)
            $this->acceptMail ($mail);

    }

/**
 * Sets the mail message to be sent.
 * @param \callow\mail\Mail $mail
 * @return \callow\mail\MailSender
 */
    public function acceptMail(Mail $mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Sends the messge to the mail sending program.
     * @return boolean
     */
    public function send()
    {
        if(!$this->mail)
            return FALSE;

        $to = $this->mail->getDest();

        $subject = $this->mail->getSubject();

        $message = $this->mail->getMessage();

        return mail ($to, $subject, $message);
    }


}

?>
