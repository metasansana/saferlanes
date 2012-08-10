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
use proof\sql\SQLFetchHandler;
use proof\sql\SQLStatusListener;
use proof\sql\BasePDOProvider;
use proof\sql\SilentPDOProvider;
use proof\sql\PreparedStatement;
use proof\util\ArrayList;

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

        $this->plate = strtolower(str_replace(' ', NULL, trim($plate_number)));

    }

    public function isValid()
    {

        $flag = preg_match(PlateNumber::PLATE_NUMBER_PATTERN, $this->plate);

        if($flag === 1)
            return TRUE;

        if($flag === 0 )
        return FALSE;

    }

    public function findDriver(\PDO $pdo , SQLFetchHandler $handler, SQLStatusListener $listener)
    {

        $pstmt = new PreparedStatement(new SilentPDOProvider(new BasePDOProvider($pdo)));

        $pstmt->addStatusListener($listener);

        $pstmt->prepare(SQL::FETCH_DRIVER);

        $pstmt->setPlaceHolderParams(new ArrayList(array($this->plate)));

        $pstmt->fetch($handler);

    }

    public function like(\PDO $pdo , SQLStatusListener $listener)
    {

        $pstmt = new PreparedStatement(new SilentPDOProvider(new BasePDOProvider($pdo)));

        $pstmt->addStatusListener($listener);

        $pstmt->prepare(SQL::VOTE_PLUS);

        $pstmt->setPlaceHolderParams(new ArrayList(array($this->plate)));

        return $pstmt->push();

    }

    public function fail(\PDO $pdo , SQLStatusListener $listener)
    {

        $pstmt = new PreparedStatement(new SilentPDOProvider(new BasePDOProvider($pdo)));

        $pstmt->addStatusListener($listener);

        $pstmt->prepare(SQL::VOTE_MINUS);

        $pstmt->setPlaceHolderParams(new ArrayList(array($this->plate)));

        return $pstmt->push();

    }

    public function  store(\PDO $pdo , SQLStatusListener $listener)
    {

        $pstmt = new PreparedStatement(new SilentPDOProvider(new BasePDOProvider($pdo)));

        $pstmt->addStatusListener($listener);

        $pstmt->prepare(SQL::PUSH_DRIVER);

        $pstmt->setPlaceHolderParams(new ArrayList(array($this->plate, time())));

        return $pstmt->push();

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