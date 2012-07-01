<?php

/**
 * timestamp May 30, 2012 12:00:39 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\domain;
 *
 *
 */

namespace saferlanes\core;

use callow\domain\AbstractDomain;
use callow\dbase\DatabaseMapper;

class Driver extends AbstractDomain implements DriverInterface
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

        $validator = new DriverValidator();

        $plate = strtolower(str_replace(' ', NULL, trim($plate)));

        if (!$validator->isValid('plate', $plate))
        {
            throw new InvalidPlateNumberError();
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

        $validator = new DriverValidator();

        if (!$validator->isValid('plus', $plus))
        {
            throw new BadValueException('plus', $plus, $validator->getError('plus'));
        }

        return $this;

    }

    public function setMinus($minus)
    {

        $validator = new DriverValidator();

        if (!$validator->isValid('minus', $minus))
        {
            throw new BadValueException('minus', $minus, $validator->getError('minus'));
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
