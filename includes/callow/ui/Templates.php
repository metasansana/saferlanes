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
use callow\fio\FileNotFoundException;
use callow\util\InvalidIndexException;

class Templates extends GenericCollection
{

    private $current;

    private $template_path;

    public function __construct($template_path)
    {

            $this->setPath($template_path);

    }

    public function add($index, $markup)
    {

        return parent::add($index, (string) $markup);

    }

    /**
     * Sets the path to the current template file, throws an exception if the file cannot be accessed.
     * @param string $filename
     * @return boolean
     * @throws FileNotFoundException
     */
    public function setTemplate($filename)
    {

        $filename = (string) $this->template_path.$filename;

        if (file_exists($filename))
        {

            $this->current = $filename;
            return TRUE;
        }
        else
        {
            throw new FileNotFoundException;
            return FALSE;
        }

    }

    public function retrieve($index)
    {
        $result = NULL;
        try
        {
            $result = parent::retrieve($index);
        }
        catch (InvalidIndexException $ex)
        {
              //oh well :/
        }

        return $result;

    }

    public function setPath($template_path)
    {
        $this->template_path = $template_path."/";
        return $this;
    }

    public function __destruct()
    {

        $output = &$this;
        include_once($this->current);

    }

}

?>
