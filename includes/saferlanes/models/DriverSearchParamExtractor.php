<?php

/**
 * timestamp Jul 14, 2012 8:52:35 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *
 */

namespace saferlanes\models;

use callow\app\Options;
use callow\http\Redirect;
use callow\http\Post;

class DriverSearchParamExtractor
{

    /**
     * The param for the driver search
     * @var string $param
     * @access private
     */
    private $param = NULL;

    public function __construct(Options &$opt)
    {
        if($opt->count() > 1)
            new Redirect('/', TRUE, TRUE);

        if($opt->count() === 1)
        {
            $this->param = $opt[0];
        }
        else
        {
            $this->checkPost();
        }


    }

    private function checkPost()
    {

         $posted = new Post();

            if($posted->contains('plate'))
                $this->param = $posted->get('plate');

    }

    public function getParam()
    {
        return $this->param;
    }

}

?>
