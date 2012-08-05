<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 1:00:08 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 * Interface for pushing (updating) sql statements.
 *
 */
interface Pushable
{

    public function push();

}