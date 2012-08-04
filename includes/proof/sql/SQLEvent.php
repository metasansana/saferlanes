<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 7:48:20 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Event that is fired by SQL executing classes.
 *
 *
 */
use proof\util\AbstractEvent;

class SQLEvent extends AbstractEvent
{

    /**
     *  A five character alphanumeric identifier of the sql state defined in the ANSI SQL standard.
     * @var string $state
     * @access private
     */
    private $state;

    /**
     * The error code of the operation that caused this event
     * @var int $code
     * @access private
     */
    private $code;

    /**
     * An error message associated with the operation that caused this event.
     * @var string $message
     * @access private
     */
    private $message;

    /**
     * The PDOProvider object that was used to perform the operation that caused this event.
     * @var proof\util\PDOProvider $provider
     * @access private
     */
    private $provider;

    public function __construct($src, PDOProvider $provider, array $meta)
    {

        $this->state = $meta[0];
        $this->code = $meta[1];
        $this->message = $meta[2];
        $this->provider = $provider;

        parent::__construct($src);

    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCode()
    {
        return $this->code;
    }

    public  function getMessage()
    {
        return $this->message;
    }



}