<?php
namespace proof\hwk;
/**
 * timestamp Jul 22, 2012 6:49:03 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk
 *
 *  Iterface for view providers of a web application.
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

interface ViewPort
{

    public function add(Widget $w);

    public function import($template);

    public function reset();

    public function setTemplates(ArrayList $templates);

    public function setWidgets(Map $widgets);

    public function getTemplates();

    public function getWidgets();

    public function display();


}