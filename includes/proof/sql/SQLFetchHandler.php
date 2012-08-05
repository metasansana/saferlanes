<?php
namespace proof\sql;

/**
 * timestamp Aug 4, 2012 11:55:21 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Interface for receiving the results of sql query (fetch)  commands.
 *
 */
use proof\util\Map;

interface SQLFetchHandler
{

    public function onFetch(array $row);

}