<?php
namespace proof\sql;
/**
 * timestamp Aug 4, 2012 11:15:10 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\sql
 *
 * Inteface for classes that listen to the effect of an sql command.
 *
 *
 *
 */
interface CommandHandler
{

    public function onSuccess(PDOProvider $provider);

    public function onFailure(PDOProvider $provider, SQLState $status);



}