<?php

/**
 * timestamp Jun 20, 2012 5:20:34 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security\auth
 *
 *  Class for enscapulating application users.
 *
 */

namespace callow\security\auth;

use callow\domain\AbstractDomain;

class User extends Domain
{

    /**
     * The user's name.
     * @var string $user_name
     * @access protected
     */
    protected $user_name;

    /**
     * The user's password.
     * @var string password
     * @access protected
     */
    protected $password;

    /**
     * The user's email address.
     * @var string $email_address;
     * @access protected;
     */
    protected $email_address;

   /**
    * The level of the user
    * @var int $level
    * @access protected;
    */
    protected $level;



}

?>
