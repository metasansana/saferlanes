<?php
namespace saferlanes;
/**
 * timestamp Aug 4, 2012 7:31:18 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *  Contains all the SQL code for saferlanes.
 *
 */
class SQL
{

    const FETCH_DRIVER = "SELECT `plate`, `timestamp`, `plus`, `minus` FROM driver WHERE plate=?";

    const PUSH_DRIVER = "INSERT INTO driver (`plate`, `timestamp`) VALUES (?, ?)";

    const VOTE_PLUS  = "UPDATE driver SET plus = plus+1 WHERE  plate = ?";

    const VOTE_MINUS = "UPDATE driver SET minus = minus+1 WHERE  plate = ?";

}