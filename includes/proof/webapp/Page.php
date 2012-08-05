<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 11:59:37 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for page classes.
 *
 */
use proof\util\ArrayList;
use proof\util\Map;

class Page
{
    /**
     * A list of templates to be imported.
     * @var proof\util\ArrayList;
     * @access private
     */
    private $templates;

    /**
     * A mapping of labels to html code.
     * @var proof\util\Map
     * @access private
     */
    private $content;


    public function __construct(ArrayList $templates, Map $content)
    {
        $this->templates = $templates;
        $this->content = $content;

    }

    public function addTemplate($template)
    {
        $this->templates->add($template);
        return $this;
    }

    public function addContent($label, $value)
    {
        $this->content->add($label, $value);
        return $this;
    }

    public function addWidget(Widget $w)
    {

        $map =  $w->getContent()->toArray();


        foreach($map as $label=>$value)
        {
            $this->addContent($label, $value);

        }

        return $this;

    }

    public function getTemplates()
    {
        return $this->templates;

    }

    public function getContent()
    {
        return $this->content;
    }

    public function show()
    {

        $page  = $this->content->toArray();


        foreach($this->templates as $value)
        {
            require_once $value;
        }


        return $this;
    }

}