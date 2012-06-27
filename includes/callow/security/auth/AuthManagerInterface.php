<?php

/**
 * timestamp Jun 24, 2012 9:37:57 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security\auth
 *
 *  Interface for classes that manage the authentication process of an application.
 *
 */

namespace callow\security\auth;

interface AuthManagerInterface
{

    public function authenticate();

    public function isAuthenticated();

}

?>
