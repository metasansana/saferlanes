<?php

/**
 * timestamp Jun 23, 2012 10:54:07 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security\oauth
 *
 * The consumer class represents the consumer role in an oauth transaction. This class stores the consumer information
 * that the oauth spec necessitates in order for a transaction to be performed.
 *
 */

class Consumer
{

    /**
     * The key is the api key that is received from an oauth service provider.
     * @var string $key;
     * @access protected
     */
    protected $key;

    /**
     * This is the secret the service provider provides when you register for their oauth service.
     * @var string $secret
     * @access protected
     */
    protected $secret;

    public function __construct($key,  $secret)
    {

        $this->key = $key;

        $this->secret = $secret;

    }

    public function getKey()
    {
        return $this->key;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function __toString()
    {
        return "{$this->key}|{$this->secret}";
    }


}

?>
