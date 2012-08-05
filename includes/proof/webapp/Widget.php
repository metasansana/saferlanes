<?php
namespace proof\webapp;
/**
 * timestamp Aug 1, 2012 10:45:00 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Widgets contain collections of label to html pairs that can be added to a page to provide
 * dynamic sections.
 *
 */
use proof\Map;

class Widget
{

    /**
     * A Map object containing the contents of this widget
     * @var proof\util\Map $content
     * @access
     */
    protected $content;

    public function __construct()
    {
        $this->content = new Map;

    }

    /**
     * Returns the mapped content for this widget.
     * @return proof\util\Map    Map containing the contents of this widget.
     */
    public function getContent()
    {
        return $this->content;
    }

}