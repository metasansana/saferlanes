<?php

/**
 * timestamp Jul 7, 2012 12:06:42 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\html;
 *
 *  Class representing an html template to be used for display.
 *
 */

namespace callow\html;

use callow\Collection;
use callow\util\OrderedList;


class Template
{

    /**
     * Reference to an HTMLContainer object.
     * @var HTMLContainer $container
     */
    private $container;

    /**
     * Flags whether to show the template or not.
     * @var boolean $flag
     * @access private;
     */
    private $disabled = TRUE;

    /**
     * Collection of templates to be used
     * @var OrderedList $templates
     * @access private
     */
    private $templates;

    public function __construct(OrderedList $templates = NULL, HTMLContainer &$container = NULL)
    {

        if (!$templates)
            $templates = new OrderedList();

            $this->templates = $templates;

        if ($container)
            $this->setContainer ($container);


    }

    /**
     *  Adds a template path to the current list
     * @param string $path
     * @return \callow\html\Template
     */
    public function addTemplate($path)
    {
        $path = (string) $path;

        //if(file_exists($path))
            $this->templates->add($path);

        return $this;

    }

    public function enable()
    {
        $this->disabled = FALSE;

        return $this;

    }

    public function disable()
    {
        $this->disabled = TRUE;

        return $this;

    }

    public function setContainer(HTMLContainer &$c)
    {
        $this->container = $c;
        return $this;
    }

    public function __destruct()
    {

        if (!$this->disabled)
        {

            $content = &$this->container;

            $templates = $this->templates->getIterator();

            while ($templates->hasNext())
            {
                include_once($templates->next());
            }

        }

    }

}

?>
