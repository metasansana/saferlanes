<?php

/**
 * timestamp May 29, 2012 10:00:34 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\dbase
 *
 *  Maps CRUD operations for Domain objects into SQL and vice versa.
 *
 */

namespace callow\dbase;

use callow\domain\DomainMapperInterface;
use callow\domain\AbstractDomain;

class DatabaseMapper implements DomainMapperInterface
{

    /**
     * Reference to a database connection object.
     * @var Connection $con
     * @access private
     */
    private $con;

    /**
     * Reference to the domain being managed.
     * @var DomainInterface $domain
     * @access private
     */
    private $domain;

    /**
     * Internal object used to get SQL for CRUD operations.
     * @var SQL  $sql;
     * @access private
     */
    private $sql;

    public function __construct(AbstractDomain &$domain, SQL &$sql, Connection &$con)
    {

        $this->domain = $domain;
        $this->sql = $sql;
        $this->con = $con;

    }

    public function save()
    {

        $pstmt = $this->con->prepareStatement($this->sql->toString());

        $count = $this->domain->count();

        $args = NULL;

        $c = 0;

        for ($c; $c < $count; $c++)
        {
            $args = new PreparedArray($this->domain->get());
            $pstmt->execute($args->getFormatedArray());
            unset($args);
        }
        
        return $this;

    }

    public function load()
    {

        $counter = 0;

        $args = NULL;

        $c = 0;

        $pstmt = $this->con->prepareStatement($this->sql->toString());

        $count = $this->domain->count();

        for ($c = 0; $c < $count; $c++)
        {
            $args = new PreparedArray($this->domain->get());
            $pstmt->execute($args->getFormatedArray());
            unset($args);
        }

        if($pstmt->getRowCount() <1)
            throw new NullResultSetException();

       $flag = TRUE;

        while ($flag)
        {
            $flag = $pstmt->getRow();
            if ($flag)
                $this->domain->set($flag);
        }

        return $this;

    }

    public function edit()
    {

        $pstmt = $this->con->prepareStatement($this->sql->toString());

        $count = $this->domain->count();

        $args = NULL;

        $c = 0;

        for ($c; $c < $count; $c++)
        {
            $args = new PreparedArray($this->domain->get());
            $pstmt->execute($args->getFormatedArray());
            unset($args);
        }

        if(! $pstmt->getRowCount() >0 )
            throw new IncompleteStatementException();

        return $this;

    }

    public function delete()
    {

        $pstmt = $this->con->prepareStatement($this->sql->toString());

        $count = $this->domain->count();

        $args = NULL;

        $c = 0;

        for ($c; $c < $count; $c++)
        {
            $args = new PreparedArray($this->domain->get());
            $pstmt->execute($args->getFormatedArray());
            unset($args);
        }

        if(! $pstmt->getRowCount() >0 )
            throw new IncompleteStatementException();

        return $this;

    }

}

?>
