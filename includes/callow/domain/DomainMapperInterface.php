<?php

/**
 * timestamp May 21, 2012 4:59:05 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\domain
 *
 *  The DomainManager class provides a reusable interface for performing CRUD operations.
 *
 *
 */

namespace callow\domain;

interface DomainMapperInterface
{

    public function save();

    public function load();

    public function edit();

    public function delete();
}



?>
