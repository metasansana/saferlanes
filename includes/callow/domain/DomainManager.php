<?php

/**
 * timestamp May 21, 2012 4:59:05 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\domain
 *
 *  The DomainManager class provides a reusable interface for performing CRUD operations.
 *
 *
 */

namespace callow\domain;

use callow\dbase\Connection;


class DomainManager
{

    /**
     * Reference to a database connection object.
     * @var Connection $con
     * @access protected
     */
    protected $con;

    /**
     * Reference to the domain being managed.
     * @var DomainInterface $domain
     * @access protected
     */
    protected $domain;

    /**
     * Internal object used to get SQL for CRUD operations.
     * @var DomainCode  $dcode;
     * @access protected
     */
    protected $dcode;

    public function __construct(Domain &$domain, DomainCode &$dcode, Connection &$con)
    {

        $this->domain = $domain;
        $this->dcode = $dcode;
        $this->con = $con;

    }


    public function save()
    {



        $sql = $this->dcode->getSaveCode();

        while($sql->hasNext())
        $pstmt = $this->con->prepareStatement($sql->next());

        $c = 0;
        $dc = $this->domain->count();

        for ($c; $c<$dc; $c)
        {

            $adpt = new DomainAdapter($this->dmain);
            $pstmt->execute($adpt->toArray());

        }



        return;

    }

    public function load()
    {

        $sql = $this->dcode->getLoadCode();

        $pstmt = $this->con->prepareStatement($sql);

        $adpt = new DomainAdapter($this->dmain);

        if (!$pstmt->execute($adpt->toArray()))
        {
            return FALSE;
        }

        return $pstmt->flush($this->dmain);


    }

    public function edit()
    {

        $sql = $this->dcode->getUpdateCode();

        $pstmt = $this->con->prepareStatement($sql);

        $adpt = new DomainAdapter($this->dmain);

        return $pstmt->execute($adpt->toArray());


    }

    public function delete()
    {
        $sql = $this->dcode->getDeleteCode();

        $pstmt = $this->con->prepareStatement($sql);

        $adpt = new DomainAdapter($this->dmain);

        return $pstmt->execute($adpt->toArray());

    }



}

?>
