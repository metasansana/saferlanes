<?php

namespace proof\webapp;

/**
 * timestamp Jul 30, 2012 12:02:30 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 * Abstract class for making implementation of the Page interface easier.
 *
 */
use proof\util\Map,
    proof\util\ImportList,
    \proof\util\ArrayList;

class WebPage implements Page
{

    /**
     * Collection of properties made available to templates via the $page variable.
     * @var proof\util\ Map $properties
     * @access protected
     */
    protected $properties;

    /**
     * A list of templates that will be imported into the application's runtime.
     * @var proof\util\ImportList
     * @access protected
     */
    protected $templates;

    public function __construct()
    {
        $this->properties = new Map();
        $this->templates = new ImportList();

    }

    /**
     * Makes a property available to $page
     * @param proof\types\String $name
     * @param proof\types\String $value
     * @return \proof\webapp\WebPage
     */
    public function addProperty($name, $value)
    {

        $this->properties->add($name, $value);

        return $this;

    }

    /**
     * Adds a template to a list of templates to be imported.
     * @param proof\types\String $temp
     * @return \proof\webapp\WebPage
     */
    public function addTemplate($temp)
    {

        $this->templates->add($temp);

        return $this;

    }

    /**
     * Returns a Map containing name-property pairs.
     * @return proof\util\Map
     */
    public function getProperties()
    {

        return $this->properties;

    }

    /**
     * Returns an ArrayList containing templates to be imported
     * @return proof\util\ArrayList;
     */
    public function getTemplates()
    {

        $list = new ArrayList($this->templates->toArray());

        return $list;

    }

}