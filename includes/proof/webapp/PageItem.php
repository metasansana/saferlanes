<?php
namespace proof\webapp;
/**
 * timestamp Aug 4, 2012 4:03:52 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Class for re-using output formats to a Page object.
 *
 */
class PageItem
{

    /**
     * The content of this page item.
     * @var string content;
     * @access  protected
     */
    protected $content;

    public function __construct($content)
    {
         $this->content = $content;

    }

    public function __toString()
    {
        return $this->content;

    }

}