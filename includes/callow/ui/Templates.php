<?php

/**
 * timestamp Jun 28, 2012 2:43:47 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\ui
 *
 *
 *
 *
 *
 */

namespace callow\ui;

use callow\util\GenericCollection;
use callow\util\InvalidIndexException;

class Templates
{

    protected $markup;
    protected $files;
    protected $template_directory;

    public function __construct($template_path, Collection $markup = NULL, array $files = NULL)
    {

        $this->setPath($template_path);

        if ($markup)
        {
            $this->setMarkup($markup);
        }
        else
        {
            $this->markup = new GenericCollection();
        }

        if ($files)
            $this->setFileNames($files);

    }

    public function addFileName($filename)
    {

        $this->files[] = "$this->template_directory/$filename";
        return $this;

    }

    public function setPath($template_path)
    {
        $this->template_directory = $template_path . "/";
        return $this;

    }

    public function addMarkup($label, $html)
    {
        $this->markup->add((string) $label, (string) $html);
        return $this;

    }

    public function setFileNames(array $filenames)
    {
        foreach ($filenames as $key => &$value)
        {
            $this->setFileNames($value);
        }

        return $this;

    }

    public function setMarkup(GenericCollection $markup)
    {
        $this->markup = $markup;
        return $this;

    }

    public function getFileNames()
    {
        return $this->files;

    }

    public function getMarkup()
    {
        return $this->markup;

    }

    public function getTemplatePath()
    {
        return $this->template_directory;

    }

    public function __destruct()
    {

        $content = &$this->markup;

        foreach ($this->files as &$value)
        {
            include_once($value);
        }

    }

}

?>
