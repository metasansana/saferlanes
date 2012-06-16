<?php

/**
 * timestamp May 29, 2012 11:08:51 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\dbase
 *
 *  Thrown when the execution of a prepared statement fails.
 *
 */

namespace callow\dbase;

class ExecutionFailedException extends \Exception
{

public function __construct(array $errors)
{
    $this->message = $errors[2];
}

}

?>
