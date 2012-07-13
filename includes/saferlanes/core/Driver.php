<?php

/**
 * timestamp May 30, 2012 12:00:39 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core
 *
 *  The DriverObject represents a driver.
 *
 */

namespace saferlanes\core;

use callow\domain\Domain;


class Driver extends Domain implements DriverInterface
{

    protected $plate;
    protected $timestamp;
    protected $plus;
    protected $minus;

    public function __construct(array $driver = NULL)
    {
        if ($driver)
            $this->set($driver);

    }

    public function setPlate($plate)
    {

        $validator = new InternalDriverValidator();

        $plate = strtolower(str_replace(' ', NULL, trim($plate)));

        if (!$validator->isValid('plate', $plate))
        {
            throw new BadPlateNumberException();
        }
        else
        {
            $this->plate = $plate;
        }


        return $this;

    }

    public function setTimeStamp()
    {

        $this->timestamp = time();
        return $this;

    }

    public function setPlus($plus)
    {

        $validator = new InternalDriverValidator();

        if (!$validator->isValid('plus', $plus))
        {
            throw new VoteError();
        }

        return $this;

    }

    public function setMinus($minus)
    {

        $validator = new InternalDriverValidator();

        if (!$validator->isValid('minus', $minus))
        {
            throw new VoteError();
        }

        return $this;

    }

    public function getPlate()
    {
        return $this->plate;

    }

    public function getTimeStamp()
    {
        return $this->timestamp;

    }

    public function getPlus()
    {
        return $this->plus;

    }

    public function getMinus()
    {
        return $this->minus;

    }


}

?>
