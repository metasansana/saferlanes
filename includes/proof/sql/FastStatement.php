<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 9:00:02 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Alternative to prepared statement. Runs the sql command in one go.
 *
 */
class FastStatement extends Statement
{


    public function pull(PullHandler $handler)
    {

        $pdo = $this->provider->getPDO();





    }

    public function put(SQLEventHandler $handler)
    {

    }
}