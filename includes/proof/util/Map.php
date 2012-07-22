<?php
namespace proof\util;
/**
 * timestamp Jul 22, 2012 7:10:25 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 * Contains mappings from indices to data items.
 *
 */
class Map extends AbstractCollection
{

    public function getIterator()
    {
        return new \ArrayIterator($this);
    }


}