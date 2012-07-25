<?php
namespace proof\hwk;
/**
 * timestamp Jul 22, 2012 5:43:47 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk;
 *
 *  Widget classes contain customized html code that will be displayed to screen
 *
 */
interface Widget
{

    /**
     *Returns the name of the widget
     */
    public function getName();

    /**
     *Return the html of the widget
     */
    public function getHtml();

    /**
     * Magic method for converting the widget to a string
     */
    public function __toString();


}