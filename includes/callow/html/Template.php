<?php

/**
 * timestamp Jul 7, 2012 12:06:42 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\html;
 *
 *  The template class is used to import an html template file just before the application terminates.
 *
 */

namespace callow\html;

class Template
{

    /**
     * The path to the template file
     * @var string $file_path
     * @access private
     */
    private $template_file;

    /**
     * Reference to an HTMLContainer object.
     * @var HTMLContainer $container
     */
    private $container;

    public function __construct($template_path=NULL)
    {

            if($template_path)
            $this->setFilePath ($template_path);

    }


public  function setFilePath($file_path)
{
    $file_path = (string)$file_path;

    $this->template_file = $file_path;

}

public function setContainer(HTMLContainer &$container)
{
    $this->container = $container;
    return $this;
}

    public function __destruct()
    {

        $content = &$this->container;

        include_once($this->template_file);


    }
    }

?>
