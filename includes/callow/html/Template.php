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


class Template
{

    /**
     * The path to the template file
     * @var string $file
     * @access private
     */
    private $filename;

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

    public function __construct($filename = NULL, HTMLContainer &$container = NULL)
    {

        if ($filename)
            $this->set($filename);

        if (!$container)
            $container = new HTMLContainer();

        $this->container = $container;

    }

    public function set($filename)
    {
        $filename = (string) $filename;

        $this->filename = $filename;

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

    public function __destruct()
    {

        if (!$this->disabled)
        {

            $content = &$this->container;

            include_once($this->filename);
        }

    }

}

?>
