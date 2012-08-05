<?php
namespace proof\http;
/**
 * timestamp Jul 31, 2012 4:41:47 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 * Sends a timed redirect request to the user.
 *
 */
class Location extends Header
{

    /**
     * The time (in seconds) the browser should wait before redirecting.
     * @var int $timeout
     * @access private
     */
    private $timeout;

    /**
     * The location to redirect to.
     * @var string $location
     * @access private
     */
    private $location;

    public function __construct($location, $timeout = NULL)
    {

        $this->location = $location;
        $this->timeout = $timeout;

    }

    public function send($overwrite = TRUE)
    {


        if ($this->timeout)
        {
            $this->text = "Refresh:{$this->timeout}; URL={$this->location}";
        }
        else
        {
            $this->text = "Location: {$this->location}";
        }

        parent::send($overwrite);

        exit();

    }

}