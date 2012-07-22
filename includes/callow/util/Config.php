<?php
namespace callow\util;
/**
 * timestamp Jul 22, 2012 4:39:42 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *  Class used for quickly reading an ini file into an application.
 *
 *
 */
class Config extends Collection
{

public function __construct($ini_file)
{

    $this->items = parse_ini_file($ini_file);
    
}

}

?>
