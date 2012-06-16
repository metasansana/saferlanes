<?php

/**
 * timestamp May 8, 2012 4:13:42 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\mvc;
 *
 * Manages the screen for a callow application.
 * The Screen object is really a collection of key value pairs. The template loaded has
 * access to these pairs when it is included. This allows output to be pulled in just before the
 * application (or screen object) terminates.
 *
 */

namespace callow\mvc;

use callow\util\Collection;

class Screen extends Collection
{

    /**
     * Indicates the type of template to load
     * @var string $template
     * @access protected
     */
    protected $template;

    /**
     * Flag for placing a lock on updates.
     * @var boolean $lock
     * @access protected
     */
    protected $lock = FALSE;


    /**
     * Attempts to set the path to the template to be used.
     * @param string $file_name
     * @return boolean
     */
    public function setTemplate($file_name)
    {

        if (!$this->lock)
        {

            if (is_string($file_name))
            {
                $file = str_replace
                        ('.:', NULL, get_include_path() . DIRECTORY_SEPARATOR . 'saferlanes/templates/' . $file_name . ".php");
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
        return FALSE;

    }


    /**
     * Prevents the Screen object from doing any further updates.
     * @return \callow\mvc\Screen
     */
    public function lock()
    {
        $this->lock = TRUE;
        return $this;

    }

    public function unlock()
    {
        $this->lock = FALSE;
        return $this;

    }


    public function get($index)
    {
        try
        {
            $result  = parent::get($index);
        }
        catch (\Exception $exc)

        {
            $result = NULL;
        }

        return $result;


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
