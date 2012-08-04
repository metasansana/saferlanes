<?php
namespace proof\sql;
/**
 * timestamp Aug 3, 2012 8:38:27 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Interface for classes interested in fetch events.
 *
 */
use proof\util\Map;

interface PullHandler extends SQLEventHandler
{

    public function onFetch(Map $row);

}