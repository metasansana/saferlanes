<?php

/**
 * timestamp Jun 19, 2012 3:57:22 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mail
 *
 * The mail class represents a typical plain text based email message.
 * This class intentionally does not support addtional headers, this work is left up to subclases.
 *
 */

namespace callow\mail;

use callow\framework\String;

class Mail
{

    /**
     * The address the message is going to.
     * @var string $dest_address
     * @access protected
     */
    protected $dest_address;

    /**
     * The subject of the message
     * @var string $message
     * @access protected
     */
    protected $subject;

    /**
     * The actual message to send.
     * @var String $message
     */
    protected $message;

    public function __construct()
    {

    }

    /**
     * Sets the destination address of the email.
     * @param string $email_address
     * @return \callow\mail\Mail
     * @throws InvalidEmailAddressException
     */
    public function setDest($email_address)
    {

        $result = filter_var($email_address, FILTER_VALIDATE_EMAIL);

        if (!$result)
        {
            throw new InvalidEmailAddressException();
            return $this;
        }
        else
        {
            $this->dest_address = $email_address;
            return $this;
        }

    }

    /**
     * Sets the subject of the mail message.
     * @param string $subject
     * @return \callow\mail\Mail
     */
    public function setSubject($subject)
    {
        $this->subject = (string) $subject;
        return $this;

    }

    /**
     * Sets the message of the mail.
     * @param String $msg
     * @return \callow\mail\Mail
     */
    public function setMessage(String $msg)
    {

        $this->message = wordwrap($msg, 70);
        return $this;

    }

    /**
     * Returns the destination address.
     * @return string
     */
    public function getDest()
    {
        return $this->dest_address;

    }

    /**
     * Returns the subject.
     * @return string
     */
    public function getSubject()
    {

        return $this->subject;

    }

    /**
     * Returns the message.
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

}

?>
