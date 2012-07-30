<?php

namespace proof\webapp;

/**
 * timestamp Jul 30, 2012 11:59:37 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for page classes.
 *
 */
use proof\types\String;

interface Page
{

    public function addProperty($name, $value);

    public function addTemplate($temp);

    public function getProperties();

    public function getTemplates();

    public function show();

}