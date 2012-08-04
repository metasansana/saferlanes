<?php

namespace saferlanes;


/**
 * timestamp Jul 29, 2012 9:35:48 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *  A plate number class.
 *
 */
class PlateNumber
{

    const PLATE_NUMBER_PATTERN = '/^(p|d|r|h|v|x|t{1})([a-z]){0,2}(\d){1,4}$/';

    /**
     * The plate number
     * @var proof\types\String plate
     * @access private
     */
    private $plate;

    public function __construct($plate_number)
    {

        $this->plate = $plate_number;

    }

    public function isValid()
    {
        return (boolean)preg_match(PlateNumber::PLATE_NUMBER_PATTERN, $this->plate);

    }

    public function getPlate()
    {
        return $this->plate;
    }

    public function __toString()
    {
        return $this->plate;

    }

}