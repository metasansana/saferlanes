<?php
namespace proof\util;
/**
 * timestamp Jul 25, 2012 8:27:45 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Interface for objects that can include (import) files into the execution environment.
 *
 */
interface Importable
{

    public function import();

}