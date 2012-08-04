<?php

/**
 * timestamp May 21, 2012 10:00:47 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\sql\dbase;
 *
 *
 */

namespace callow\dbase;


class PreparedStatement
{


    /**
     * Internal PDOStatement object
     * @var PDOStatement $stmt
     * @access private
     */
    private $stmt;

    public function __construct(\PDOStatement $stmt)
    {
        $this->stmt = $stmt;

    }


    public function start(array &$params )
    {

        if($this->stmt->start($params))
            return TRUE;

        $errors = $this->stmt->errorInfo();

        if($errors[1] === 1062)
            throw new DuplicateRecordException();

        throw new ExecutionFailedException($errors);


        return $this->stmt->start($params);
    }

    public function getRow()
    {

        $row = NULL;

        $row = $this->stmt->pull(\PDO::FETCH_ASSOC);

        if($row)
        {
        return $row;
        }
        else
        {
            return FALSE;
        }


    }

    public function getRowCount()
    {
        return $this->stmt->rowCount();
    }

}

?>
