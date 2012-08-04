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
use proof\util\ArrayList;

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

    /**
     * The PDO object supplied by the provider. @todo This may completely replace the provider
     * @var \PDO $pdo
     * @access protected
     */
    protected $pdo;

    /**
     * Handler for the status of SQL commands.
     * @var proof\util\ArrayList;
     * @access protected.
     */
    protected $handlers;

    public function __construct(PDOProvider $provider, $stmt = NULL)
    {

        $this->provider = $provider;
        $this->pdo = $provider->getPDO();
        $this->stmt = $stmt;
        $this->handlers = new ArrayList;

    }

    public function addStatusListener(SQLStatusListener $h)
    {
        $this->handlers->add($h);
        return $this;
    }

    protected function raiseFailureFlag()
    {
        foreach($this->handlers as $h)
        {
            $h->onFailure($this->provider, $this->pdo->errorInfo());
        }
    }

    /**
     * Sets the executable statement
     * @param string $cmd
     */
    public function setCommand($cmd)
    {
        $this->stmt = $cmd;

        return $this;

    }

}