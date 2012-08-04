<?php

namespace proof\sql;


/**
 * timestamp Aug 4, 2012 8:35:08 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Parent class of sql Statement classes. The Statement family only represents a generic
 *  sql statement which can be INSERT,DELETE, SELECT, UPDATE or vendor specific commands.
 *
 */
abstract class Statement
{

    /**
     * The string version of the sql statement to be executed.
     * @var string $stmt
     * @access protected
     */
    protected $stmt;

    /**
     * The PDOProvider to use for execution.
     * @var proof\sql\PDOProvider $provider
     * @access protected
     */
    protected $provider;

    public function __construct($stmt, PDOProvider $provider)
    {

        $this->stmt = $stmt;
        $this->provider = $provider;

    }

    abstract public function put(SQLEventHandler $handler);

    abstract public function pull(PullHandler $handler);

    /**
     * Sets the executable statement
     * @param string $stmt
     */
    public function setStatement($stmt)
    {
        $this->stmt = $stmt;

        return $this;

    }

}