<?php
namespace saferlanes;
/**
 * timestamp Jul 10, 2012 6:37:38 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 *
 */
use proof\webapp\PageItem;

class AlertBox extends PageItem
{

public function __toString()
{

    return "<div class ='alert'>{$this->content}</div>";

}

}