<?php

/**
 * timestamp May 24, 2012 4:41:36 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\security
 *
 *  Performs a comparison between the session csrf token and the browser sent value.
 *
 */

namespace callow\security;

use callow\http\session\Session;
use callow\kit\String;
use callow\http\PostReader;

class ForgeryChecker
{

    /**
     * The name of the token sent to the browser and stored in the session object.
     * @var string $token_name
     */
    private $token_name;

    /**
     * Constructor
     * @param string $token_name
     */
    public function __construct($token_name)
    {
        $this->token_name = $token_name;
    }

    /**
     * Verifies that the session csrf token and the the browser csrf token are the same.
     * @return boolean
     */
    public function isAcceptable($token)
    {

         $session = new Session();

         $stoken = $session->get($this->token_name);

         if(!$stoken)
             return FALSE;

         $alyzer = new String($token);

         return $alyzer->equals($stoken);

    }
}

?>
