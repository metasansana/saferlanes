<?php
namespace proof\security;
/**
 * timestamp May 23, 2012 9:31:54 PM
 *
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\security
 *
 *  Class representing a RandomToken
 */
class RandomToken
{

    /**
     * The random token associated with this class.
     * @var string $token
     */
    private $token;

    public function __construct()
    {

        $this->token =md5(uniqid(rand(), true));

    }

    public function __toString()
    {
        return $this->token;

    }

}

?>
