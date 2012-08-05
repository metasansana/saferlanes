<?php
namespace saferlanes;
/**
 * timestamp May 30, 2012 12:00:39 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 *
 */

class Driver
{

    /**
     * The plate number of the driver.
     * @var string $plate
     * @access private
     */
    private $plate;

    /**
     * Timestamp of when the driver was created
     * @var \Date  $timestamp
     * @access private
     */
    private $timestamp;

    /**
     * The number of plus votes this driver has
     * @var int $plus
     * @access private
     */
    private $plus;

    /**
     * The number of minus votes this driver has
     * @var int $minus
     * @access private
     */
    private $minus;

    public function __construct(array $driver)
    {

        foreach ($driver as $key=>$value)
        {
           $this->$key = $value;
        }

    }

    public function getPlate()
    {
        return new PlateNumber($this->plate);

    }

    public function getTimeStamp()
    {
        $stamp = new \DateTime();
        $stamp->setTimestamp((int)$this->timestamp);
        return $stamp;

    }

    public function getLikes()
    {
        return $this->plus;

    }

    public function getFails()
    {
        return $this->minus;

    }


}