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

namespace callow\security\oauth;

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

    public function __construct(array $creds = NULL)
    {

        if($creds)
        {
            if($creds['key'])
            {
               $this->setKey($creds['key']);
            }

            if($creds['secret'])
            {
                $this->setSecret($creds['secret']);
            }
        }
    }

    /**
     * Sets the api key for the consumer. (provided by the  oauth service provider)
     * @param mixed $key
     * @return \callow\security\oauth\Consumer
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;

    }

    /**
     * Sets the secret of the consumer. (provided by the  oauth service provider)
     * @param mixed $secret
     * @return \callow\security\oauth\Consumer
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * Returns the consumer key.
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Returns the consumer secret.
     * @return mixed
     */
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
