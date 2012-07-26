<?php

namespace proof\util;


/**
 * timestamp Jul 26, 2012 4:45:49 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Interface for classes that retrieve domain object infomation from a source.
 *
 */
interface Provider
{

    public function valid();

    public function getErrors();

    public function provide();

}