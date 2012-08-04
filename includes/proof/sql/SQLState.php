<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 11:48:43 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Class representing the resulting state of an sql command.
 *
 */
class SQLState
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

    public function __construct(array $info)
    {

        $this->state = $info[0];
        $this->code = $info[1];
        $this->message = $info[2];

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