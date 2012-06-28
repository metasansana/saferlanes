<?php

/**
 * timestamp Jun 28, 2012 2:43:47 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\ui
 *
 *  Class representing an HTML template.
 *  Once this class is created it will include_once the template that it relates to. Add widjets to this class using the add
 *  method and they can be retrieved by makin $output->get('WIDGET_KEY') calls inside the template itself.
 *
 */

namespace callow\ui;

use callow\util\GenericCollection;

class Template extends GenericCollection
{

    /**
     * The absolute filename of the template to be used.
     * @var string $template
     * @acces protected
     */
    protected $template;


    public function __construct($template= NULL)
    {
        if($template)
            $this->setTemplate ($template);
    }


    public function add($index, $markup)
    {

        return parent::add($index, (string)$markup);

    }

      /**
     * Attempts to set the path to the template to be used.
     * @param string $path
     * @return boolean
     */
    public function setTemplate($path)
    {

            if (is_string($path))
            {
                $file = str_replace
                        ('.:', NULL, get_include_path() . DIRECTORY_SEPARATOR . 'saferlanes/templates/' . $path . ".php");
                if (file_exists($file))
                {

                    $this->template = $file;
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }

    }

       public function __destruct()
    {
        if (!$this->lock)
        {

            if ($this->template)
            {
                $page = &$this;
                include_once($this->template);
            }
        }

    }


}

?>
