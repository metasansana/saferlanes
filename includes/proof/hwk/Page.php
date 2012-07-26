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
use proof\util\Map;
use proof\util\ImportList;
use proof\types\String;

class Page extends AbstractViewPort
{

    /**
     * List of templates to be used.
     * @var proof\util\ImportList $templates
     * @access protected
     */
    protected $imports;

    /**
     * Collection of widgets added.
     * @var proof\util\Collection $widgets
     * @access protected
     */
    protected $widgets;

    public function __construct()
    {

        $this->widgets = new Map();

        $this->imports = new ImportList();

    }

    public function addImport(String $import)
    {

        $this->imports->add($import);

        return $this;

    }

    public function addWidget(Widget $w)
    {

        $this->widgets->add($w->getName(), $w);

        return $this;

    }


    public function show()
    {

        $content = $this->widgets->toArray();

        $this->imports->import();

        return  parent::show();

    }

}