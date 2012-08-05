<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 1:00:16 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 * Interface for fetching sql statements.
 *
 */
interface Fetchable
{

    public function fetch(SQLFetchHandler $h);

}