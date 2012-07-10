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
namespace callow\event;

class Panic extends AbstractEvent
{


    public function __construct(\Exception $ex)
    {
        parent::__construct($ex->getMessage());
    }


}

?>
