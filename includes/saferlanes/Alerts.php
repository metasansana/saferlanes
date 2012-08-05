<?php

namespace saferlanes;


/**
 * timestamp Aug 5, 2012 12:44:51 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package
 *
 *
 */
class Alerts
{

    public static function getPostMessage($plate)
    {

        $date = getdate();

        return <<<MSG

User at {$_SERVER["REMOTE_ADDR"]} posted a the number $plate.
Today is: {$date['mday']} {$date['month']} {$date['year']}.
MSG;

    }

    public static function getVoteMessage($plate, $vote)
    {
        $date = getdate();

        return <<<MSG

User at {$_SERVER["REMOTE_ADDR"]} voted '$vote' on the number $plate.
Today is: {$date['mday']} {$date['month']} {$date['year']}.
MSG;

    }

}