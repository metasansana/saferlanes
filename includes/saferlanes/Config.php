<?php
namespace saferlanes;

/**
 * timestamp Aug 4, 2012 9:01:18 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */
class Config
{

    /**
     *
     * @var
     * @access
     */
    private $options;

    public  function __construct($options_file)
    {
        $this->options = parse_ini_file($options_file);

    }

    public function get($option)
    {
        if(array_key_exists($option, $this->options))
                return $this->options[$option];

        throw new \Exception("Option $option not found!");
    }

}