<?php
namespace proof\hwk;
/**
 * timestamp Jul 22, 2012 6:19:32 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk
 *
 *  Simple html widget for displaying generic html
 *
 */
class HtmlText extends AbstractWidget
{

    /**
     * Sets the html value of the widget
     * @param string $html
     * @return \proof\hwk\AbstractWidget
     */
    public function setHtml($html)
    {

        $this->html = $html;
        return $this;

    }

    /**
     * Sets the name of the widget
     * @param string $name
     * @return \proof\hwk\AbstractWidget
     */
    public function setName($name)
    {

        $this->name = $name;
        return $this;

    }

}