<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 11:54:05 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Interface for SQL update (push) commands.
 *
 */
interface SQLPushHandler
{

    /**
     * Integer indicating how many rows were affected by the push.
     * @param int $count
     */
    public function onPush($count);

}