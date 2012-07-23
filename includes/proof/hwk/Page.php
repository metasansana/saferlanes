<?php
namespace proof\hwk;
/**
 * timestamp Jul 22, 2012 7:14:21 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk
 *
 *  Class representing a web page view port for a web application.
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

class Page implements ViewPort
{

        /**
     * List of templates to be used.
     * @var proof\util\ArrayList $templates
     * @access protected
     */
    protected $templates;

    /**
     * Collection of widgets added.
     * @var proof\util\Map $widgets
     * @access protected
     */
    protected $widgets;

    public function __construct(ArrayList $templates = NULL, Map $widgets = NULL)
    {

        if ($templates)
        {
            $this->setTemplates($templates);
        }
        else
        {
            $this->templates = new ArrayList();
        }

        if ($widgets)
        {
            $this->setWidgets($widgets);
        }
        else
        {
            $this->widgets = new Map();
        }

    }

    /**
     * Sets the internal Map
     * @param Map $widgets
     * @return \proof\hwk\AbstractViewPort
     */
    public function setWidgets(Map $widgets)
    {
        $this->widgets = $widgets;
        return $this;
    }

    /**
     *  Sets the internal template ArrayList
     * @param ArrayList $templates
     * @return \proof\hwk\AbstractViewPort
     */
    public function setTemplates(ArrayList $templates)
    {
        $this->templates = $templates;
        return $this;
    }

    /**
     * Returns the internal template ArrayList
     * @return ArrayList
     */
    public function getTemplates()
    {

        return $this->templates;

    }

    /**
     * Returns the internal Map
     * @return Map
     */
    public function getWidgets()
    {

        return $this->widgets;

    }

    /**
     * Clears the internally stored widgets and template paths
     * @return \proof\hwk\AbstractViewPort
     */
    public function reset()
    {
        $this->widgets->clear();
        $this->templates->clear();
        return $this;
    }

    /**
     * Lists a template path to be included later on.
     * @param string $template
     * @return \proof\hwk\Page
     */
    public function import($template)
    {

        $this->templates->add($template);

        return $this;

    }

    /**
     * Adds a widget that will be available to included templates.
     * @param Widget $w
     * @return \proof\hwk\Page
     */
    public function add(Widget $w)
    {

        $this->widgets->add($w->getName(), $w);

        return $this;

    }

   /**
    * Generates and displays the gui.
    */
    public function display()
    {

        $content = $this->widgets->getIterator();

        $tmpl = $this->templates->getIterator();

        while ($tmpl->valid())
        {
            include_once $tmpl->next();
        }

    }

}