<?php

namespace proof\sql;

/**
 * timestamp Aug 4, 2012 9:00:02 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Alternative to prepared statement. Runs the sql command in one go.
 *
 */
use proof\util\Map;

class FastStatement extends Statement implements Pushable, Fetchable
{

    private function _query()
    {

        $result = $this->pdo->query($this->stmt);

        if (!$result)
            $this->raiseFailureFlag($this->pdo->errorInfo());

        return $result;

    }

    public function fetch(SQLFetchHandler $h)
    {

        $result = $this->_query();

        if ($result)
        {
            foreach ($result as $row)
            {
                $h->onFetch(new Map($row));
            }

            return TRUE;

        }
        else
        {

            return FALSE;
        }

    }

    public function push()
    {

        $result = $this->_query();

        if ($result)
        {
            return $result->rowCount();

        }
        else
        {
            $this->raiseFailureFlag($this->pdo->errorInfo());
            return FALSE;
        }

    }

}