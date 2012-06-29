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
     * @var ActiveDatabase $dbase
     * @access private
     */
    private $dbase;

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

    public function __construct(AbstractDomain &$domain = NULL, SQL &$sql = NULL, ActiveDatabase &$dbase = NULL)
    {

        if($domain)
        $this->setDomain ($domain);

        if($sql)
        $this->setSQL ($sql);

        if($dbase)
        $this->setActiveDatabase ($dbase);

    }

    public function save()
    {

        $pstmt = $this->dbase->prepareStatement($this->sql);

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


        $args = NULL;

        $c = 0;

        $pstmt = $this->dbase->prepareStatement($this->sql);

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

        $pstmt = $this->dbase->prepareStatement($this->sql);

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

        $pstmt = $this->dbase->prepareStatement($this->sql);

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

    public function setActiveDatabase(ActiveDatabase &$dbase)
    {
        $this->dbase = $dbase;
        return $this;
    }

    public function setSQL(SQL &$sql)
    {
        $this->sql = $sql;
        return $this;
    }

    public function setDomain(AbstractDomain &$domain)
    {
        $this->domain = $domain;
        return $this;
    }

}

?>
