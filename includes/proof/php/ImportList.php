<?php
namespace proof\php;
/**
 * timestamp Jul 25, 2012 8:23:34 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\util
 *
 *  Class that contains a list of files to be included into the execution environment.
 *
 */
use proof\util\AbstractListing;

class ImportList extends AbstractListing implements Importable
{

    public function import()
    {

        foreach ($this as $value)
        {
            $flag = (@include_once "$value");

            if(!$flag)
                throw new BadImportException("Cannot find $value");

        }

    }

}