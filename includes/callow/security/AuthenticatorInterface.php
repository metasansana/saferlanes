<?php

/**
 * timestamp Jun 26, 2012 5:25:15 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security
 *
 * The AuthenticatorInterface is the interface for objects that know how to authenticate a user of the wep applicaiton.
 *
 *
 */

namespace callow\security;

interface AuthenticatorInterface
{

    public function verify();

    public function authenticate();

}

?>
