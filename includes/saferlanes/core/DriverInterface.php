<?php

/**
 * timestamp May 30, 2012 2:55:47 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core\domain
 *
 *
 */

namespace saferlanes\core;

use callow\domain\DomainInterface;

interface DriverInterface extends DomainInterface
{

    /**
     * Sets a plate number to the Driver.
     * @var string $plate
     */
    public function setPlate($plate);

    /**
     * Sets  the minus vote flag for a Driver.
     * @var string minus
     */
    public function setMinus($minus);

    /**
     * Sets  the plus vote flag for a Driver.
     *@var string $plus
     */
    public function setPlus($plus);

    /**
     * Sets the timestamp for a Driver;
     */
    public function setTimeStamp();

    /**
     * Returns the current platenumber.
     */
    public function getPlate();

    /**
     * Returns the current timestamp.
     */
    public function getTimeStamp();

    /**
     * Returns the current plus count.
     */
    public function getPlus();

    /**
     * Returns the current minus count
     */
    public function getMinus();

}

?>
