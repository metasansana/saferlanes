<?php

namespace proof\webapp;

/**
 * timestamp Jul 29, 2012 9:12:03 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for classes that contain a Page.
 *
 *
 *
 */

interface PageContainer
{

    public function setPage(Page $page);

    public function getPage();


}