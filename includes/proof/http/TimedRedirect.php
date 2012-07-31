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
class TimedRedirect extends HttpCommand
{

    /**
     * The time (in seconds) the browser should wait before redirecting.
     * @var int $timeout
     * @access private
     */
    private $timeout;

    public function __construct($location, $timeout)
    {

        $value = "Refresh:$timeout; URL=$location";

        parent::__construct($value);

        }

}