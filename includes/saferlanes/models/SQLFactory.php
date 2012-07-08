<?php

/**
 * timestamp May 30, 2012 9:21:25 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\tools
 *
 *
 */

namespace saferlanes\models;

use callow\dbase\SQL;

class SQLFactory
{


    const NEW_DRIVER = "INSERT INTO driver (`plate`, `timestamp`) VALUES (:plate, :timestamp)";

    const LOAD_DRIVER = "SELECT `plate`, `timestamp`, `plus`, `minus` FROM driver WHERE plate=:plate";

    const VOTE_PLUS  = "UPDATE driver SET plus = plus+1 WHERE  plate = :plate";

    const VOTE_MINUS = "UPDATE driver SET minus = minus+1 WHERE  plate = :plate";

    private $code = '';

    public function __construct($sql)
    {

            $this->code = $sql;


    }



    public  function __toString()
    {

        return $this->code;

    }

}

?>
