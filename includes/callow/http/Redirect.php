<?php

/**
 * timestamp May 13, 2012 7:24:11 AM
 *
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\http
 *
 * Class that performs an HTTP redirect.
 *
 */

namespace callow\http;

class Redirect
{

    /**
     * The location to redirect too.
     * @var string $location
     * @access private;
     */
    private $location;

    /**
     * Optional timeout for the redirect
     * @var int $timer
     * @access private
     */
    private $timer;

    public function __construct($location, $go=FALSE, $exit = FALSE)
    {

        if (is_string($location))
            $this->location = $location;

        if($go)
            $this->send ();

        if($exit)
            exit();


    }

    /**
     * Sets the  timer on the redirect
     * @param int $timer
     * @return \callow\http\Redirect
     */
    public function setTimer($timer)
    {
        if (is_int($timer))
            $this->timer = "Refresh:$timer;";

        return $this;

    }

    public function send()
    {
        if($this->timer)
        {
            $header = "{$this->timer} URL={$this->location}";
        }
        else
        {
            $header = "Location: {$this->location}";
        }

        header($header);
    }

}

?>
