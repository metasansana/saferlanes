<?php

/**
 * timestamp Jun 26, 2012 5:27:25 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security
 *
 *  Authenticator provides an abstraction for other AuthenticatorInterface objects.
 *
 */

namespace callow\security;

class Authenticator implements AuthenticatorInterface
{

    /**
     * The current authenticator being used.
     * @var AuthenticatorInterface $auth
     * @access private
     */
    private $auth;

    public function __construct(AuthenticatorInterface &$auth)
    {
        $this->setAuthenticator($auth);
    }

    public function setAuthenticator(AuthenticatorInterface &$auth)
    {
        $this->auth = $auth;
        return $this;
    }

    public function getAuthenticator()
    {
        return $this;
    }

    public function verify()
    {
        if($this->auth->verify())
            return TRUE;

        return FALSE;
    }

    public function authenticate()
    {
        $this->auth->authenticate();
    }

}

?>
