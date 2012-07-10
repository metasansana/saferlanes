<?php

/**
 * timestamp Jul 10, 2012 5:15:25 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */
namespace saferlanes\models;

use callow\event\AbstractEvent;

class Fatal extends AbstractEvent
{


    public function __construct(\Exception $ex)
    {
        parent::__construct($ex->getMessage());
    }


}

?>
