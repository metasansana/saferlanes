<?php

namespace proof\sql;

/**
 * timestamp Aug 4, 2012 1:42:43 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Prepared statement class.
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

class PreparedStatement extends Statement implements Pushable, Fetchable
{

    /**
     * The arguments that the prepared statement is to be outfitted with.
     * This array must have the same number of elements as the place holders in the statement.
     * @var array $params
     * @access private
     */
    private $params;

    /**
     *  Internally prepared PDOStatement object.
     * @var \PDOStatement $pstmt
     * @access private
     */
    private $pstmt;

    public function __construct(PDOProvider $provider)
    {
        parent::__construct($provider);

    }

    public function setNamedParams(Map $params)
    {

        $new_params = array ();

        foreach ($params as $name => &$value)
        {

            $new_name = ":$name";
            $new_params[$new_name] = $value;
        }

        $this->params = $new_params;

        return $this;

    }

    public function setPlaceHolderParams(ArrayList $params)
    {
        $this->params = $params->toArray();

    }

    public function prepare($stmt)
    {

        $this->pstmt = $this->pdo->prepare($stmt);

        if ($this->pstmt)
            return TRUE;

        $this->raiseFailureFlag($this->pdo->errorInfo());

        return FALSE;

    }

    public function fetch(SQLFetchHandler $h)
    {

        $row = NULL;

        if ($this->pstmt->execute($this->params))
        {

            do
            {

                $row = $this->pstmt->fetch();

                $h->onFetch(new Map($row));
            }
            while ($row);

            return TRUE;
        }
        else
        {

            $this->raiseFailureFlag($this->pstmt->errorInfo());
            return FALSE;
        }

    }

    public function push(SQLPushHandler $h)
    {

        if ($this->pstmt->execute($this->params))
        {
            $h->onPush($this->pstmt->rowCount());

            return TRUE;
        }
        else
        {

            $this->raiseFailureFlag($this->pstmt->errorInfo());

            return FALSE;
        }

    }

}