<?php
namespace proof\hwk;
/**
 * timestamp Jul 22, 2012 5:59:57 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk;
 *
 *
 */
abstract class AbstractWidget implements Widget
{

    /**
     *  Unique name for the widget (used internally)
     * @var string $name
     * @access protected
     */
    protected $name;

    /**
     * The html code of the widget
     * @var string $html
     * @access protected
     */
    protected $html;

    public function __construct($name=NULL, $html=NULL)
    {
        if($name)
        $this->setName($name);

        if($html)
        $this->setHtml($html);
    }

    /**
     * Returns the name of this widget
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the html value of the widget
     * @return string
     */
     public function getHtml()
    {
         return $this->html;
    }


    public function __toString()
    {

        return $this->getHtml();

    }

}