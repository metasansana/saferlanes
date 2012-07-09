<?php

/**
 * timestamp Jun 29, 2012 10:11:05 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models;
 *
 *  Helper class for manipulating driver data.
 * XXX flaged for clean up
 * @todo move sql code into here
 *
 */

namespace saferlanes\models;

use callow\dbase\SQL;
use callow\dbase\ActiveDatabase;
use callow\dbase\DatabaseMapper;
use callow\dbase\EmptyResultException;
use callow\event\Observer;
use saferlanes\core\DriverObject;


class Engine extends AbstractObservableModel
{

    private $mapper;

    public function __construct(ActiveDatabase &$dbase, Observer &$w=NULL)
    {
        $this->mapper = new DatabaseMapper($dbase);
        if($w)
            parent::__construct ($w);
    }

    public function fetchDriver(DriverObject &$driver, &$sql)
    {


        $this->mapper->setDomain($driver);

        $this->mapper->setSQL($sql);

        try
        {

        $this->mapper->load();
        }
        catch(EmptyResultException $exc)
        {

            $this->fire(new FetchFailure());

        }

        return $driver;

    }

    public function updateDriver(DriverObject &$driver, &$sql)
    {

        $this->mapper->setDomain($driver);

        $this->mapper->setSQL($sql);

        $this->mapper->edit();

        return $driver;

    }
}


?>
