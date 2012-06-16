<?php

/**
 * timestamp May 8, 2012 3:51:00 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\kit
 *
 *  Parent class of classes that provide only  get, set and examine type access to
 *  data.
 *
 */

namespace callow\kit;

abstract class Container
{

    public function __construct(array $keylist = NULL)
    {
        if($keylist)
            $this->setAll ($keylist);
    }


    /**
     *  Returns TRUE if $key exists or FALSE otherwise
     *  @var string $key
     *  @return boolean
     */
    abstract public function hasKey($key);



    /**
     * Returns the contained data in the form of an array.
     * @return boolean
     */
    abstract public function toArray();



    /**
     * Sets the value of a key
     * @var string $key
     * @var mixed $value
     */
   abstract public function set($key, $value);


   abstract public function setAll(array &$all);

    /**
     * Returns the current value of a key
     * @var string $key
     */
    abstract public function get($key);

}
?>
