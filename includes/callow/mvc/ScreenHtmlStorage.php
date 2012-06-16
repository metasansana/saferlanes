<?php

/**
 * timestamp May 8, 2012 3:44:49 AM
 *
 *
 * @project roadtroll
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package roadtroll
 *
 * Class that stores the html for Screen objects.
 *
 */

namespace callow\mvc;

use callow\kit\DynamicContainer;


class ScreenHtmlStorage extends DynamicContainer
{

    public function get ($key)
    {
        try

        {
            return parent::get ($key);
        }
        catch (\Exception $exc)

        {
            return NULL;
        }

    }

}

?>
