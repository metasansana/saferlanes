<?php

/**
 * timestamp Jun 20, 2012 5:31:30 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mail
 *
 *  Class representing an email address.
 *
 */

namespace callow\mail;

class EmailAddress
{

    /**
     * The emai address.
     * @var string $address;
     * @access protected
     */
    private $address;

    public function __construct($address = NULL)
    {

        if($address)
            $this->setAddress ($address);

    }


    /**
     *  Sets the email address
     * @param string $address
     * @return callow\mail\EmailAddress
     * @throws InvalidEmailAddressException
     */

    public  function setAddress($address)
    {
          $result = filter_var($address, FILTER_VALIDATE_EMAIL);

        if (!$result)
        {
            throw new InvalidEmailAddressException();
            return $this;
        }
        else
        {
            $this->address = $address;
            return $this;
        }

    }

    /**
     * Returns a string representation of the email address.
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function __toString()
    {
        return $this->getAddress();

    }

}

?>
