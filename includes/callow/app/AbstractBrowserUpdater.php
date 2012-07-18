<?php

/**
 * timestamp Jul 14, 2012 5:39:43 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *
 *
 */

namespace callow\app;

use callow\util\EventSource;

class AbstractBrowserUpdater extends EventSource implements BrowserUpdater
{


    /**
     * An object that listens for Browser headed changes.
     * @var BrowserUpdateListener $bul
     * @access protected
     */
    protected  $bul;

    public function __construct(BrowserUpdateListener &$bul = NULL)
    {

            $this->register ($bul);
    }

    public function register(BrowserUpdateListener &$bul)
    {
        parent::register($bul);
        return $this;
    }


}

?>
