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
use callow\dbase\DuplicateRecordException;
use callow\util\AbstractAlerter;
use callow\util\Notice;
use callow\util\Info;
use saferlanes\core\Driver;
use saferlanes\models\SQLFactory;

class Engine extends AbstractAlerter
{

    const DUPEX = 0x34351;

    private $mapper;

    private $state = 0;

    public function __construct(ActiveDatabase &$dbase)
    {
        $this->mapper = new DatabaseMapper($dbase);
    }

    public function fetchDriver(Driver &$driver)
    {


        $this->mapper->setDomain($driver);

        $this->mapper->setSQL(new SQLFactory(SQLFactory::LOAD_DRIVER));

        $result = FALSE;

        try
        {

            $this->mapper->load();

            $alert = new Info($this, AlertCodes::DRIVER_FOUND, "Found: {$driver->getPlate()}\n");

            $result = $driver;

        }
        catch (EmptyResultException $exc)
        {

            $alert = new Notice($this, AlertCodes::DRIVER_NOT_FOUND, "Not Found: {$driver->getPlate()}\n");

            $result = FALSE;
        }

        $this->notify($alert);

        return $result;

    }

    public function plusDriver(Driver $driver)
    {
        return $this->castVote($driver, SQLFactory::VOTE_PLUS);
    }

    public function minusDriver(Driver $driver)
    {
        return $this->castVote($driver, SQLFactory::VOTE_MINUS);
    }

    private function castVote(Driver &$driver, $sql)
    {

        $this->mapper->setDomain($driver);

        $this->mapper->setSQL(new SQLFactory($sql));

        $flag = FALSE;

        try
        {

        $this->mapper->edit();

        $alert = new Notice($this, AlertCodes::DRIVER_VOTED_ON, "A vote was made on {$driver->getPlate()}");

        $flag = TRUE;

        }
          catch (EmptyResultException $exc)
        {


        }


        return $flag;

    }

    public function createDriver(Driver $driver)
    {

        $this->notify(new Notice($this, AlertCodes::DRIVER_CREATE_ATTEMPT), "{$driver->getPlate()} pending!");

        $this->mapper->setDomain($driver);

        $this->mapper->setSQL(new SQLFactory(SQLFactory::NEW_DRIVER));

        $flag = FALSE;

        try
        {

        $this->mapper->save();

        $this->notify(new Notice($this, AlertCodes::DRIVER_CREATED, "Created: {$driver->getPlate()}"));

        $flag = TRUE;

        }
          catch (DuplicateRecordException $exc)
        {

              $this->state = Engine::DUPEX;
        }

        return $flag;

    }

    public function getState()
    {

    return $this->state;
    }


}

?>
