<?php

/**
 * timestamp Jul 10, 2012 4:00:07 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\core
 *
 *  Interface of classes that provides access to internally stored driver's data.
 *
 */

namespace saferlanes\core;

interface DriverProvider
{

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
