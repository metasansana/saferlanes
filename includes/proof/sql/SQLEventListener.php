<?php
namespace proof\sql;
/**
 * timestamp Aug 3, 2012 8:28:28 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 *  Interface for classes that are interested in PDO execution events.
 *
 *
 */
interface SQLEventHandler
{

    public function onSuccess(SQLEvent $e);

    public function onFailure(SQLEvent $e);

}