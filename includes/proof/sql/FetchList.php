<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 11:12:33 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Class for storing the results of an SQL fetch command.
 *
 */
use proof\util\Map;
use proof\util\ArrayList;

class FetchList extends ArrayList implements SQLFetchHandler
{

    final public function __construct()
    {
        

    }

    public function onFetch(Map$row)
    {

        $this->add($row);

    }
}