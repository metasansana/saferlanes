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

use callow\dbase\ActiveDatabase;
use callow\dbase\DatabaseMapper;
use callow\dbase\EmptyResultException;
use callow\event\UserWarn;
use callow\event\UserNotice;
use callow\event\Observer;
use saferlanes\core\Driver;
use saferlanes\models\SQLFactory;


class Engine extends AbstractObservableModel
{


    const  DRIVER_NOT_FOUND = "Sorry, that driver is not in the database yet!";

    const DRIVER_FOUND = NULL;

    private $mapper;

    public function __construct(ActiveDatabase &$dbase, Observer &$w=NULL)
    {
        $this->mapper = new DatabaseMapper($dbase);
        if($w)
            parent::__construct ($w);
    }


    public function fetchDriver(Driver &$driver)
    {


        $this->mapper->setDomain($driver);

        $this->mapper->setSQL(new SQLFactory(SQLFactory::LOAD_DRIVER));

        $flag = TRUE;

        try
        {

        $this->mapper->load();

        $event = new UserNotice(Engine::DRIVER_FOUND, $this);

        }
        catch(EmptyResultException $exc)
        {

            $event = new UserWarn(Engine::DRIVER_NOT_FOUND, $this);

            $flag = FALSE;

        }

        $this->fire($event->put('driver', $driver));






        return $flag;

    }

    public function voteDriver(Driver &$driver, $direction)
    {

        if($direction)
        {
            $sql = SQLFactory::VOTE_MINUS;
        }
        else
        {
            $sql = SQLFactory::VOTE_PLUS;
        }


        $this->mapper->setDomain($driver);

        $this->mapper->setSQL(new SQLFactory($sql));

        $this->mapper->edit();

        return $driver;

    }












}


?>
