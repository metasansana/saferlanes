<?php

namespace proof\webapp;


/**
 * timestamp Aug 4, 2012 5:56:56 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Class used for making the contents of a php.ini type config file available.
 *
 */
final class Config
{

    /**
     * The options retrieved from the config file.
     * @var array $options
     * @access
     */
    private $options;

    public function __construct($path)
    {

        $this->options = parse_ini_file($path);

    }

    public function get($option)
    {

        if (array_key_exists($option, $this->options))
        {
            return $this->options[$option];
        }
        else
        {
            throw new \Exception("Did not find the option: '$option' in the options file!");
        }

    }

}