<?php

/**
 * timestamp May 23, 2012 9:31:54 PM
 *
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security
 *
 *  Class for generating a random token.
 */

namespace callow\security;

class RandomToken
{

    /**
     * Returns a psuedo random string suitable for use as a session token
     * @return string
     */
    final public static function generate()
    {

             $token = md5(uniqid(rand(), true));

        return $token;

    }

}

?>
