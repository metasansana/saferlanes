<?php

/**
 * timestamp Jul 14, 2012 9:17:48 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *
 */

namespace callow\app;

use callow\util\EventSource;

class AbstractWorker extends EventSource implements Worker
{


    /**
     * An object that listens for internal Events
     * @var AlertListener $iel
     * @access protected
     */
    protected  $iel;

    public function __construct(AlertListener &$iel)
    {


            $this->register ($iel);


    }


    public function register(AlertListener &$iel)
    {
        $this->iel = $iel;
        return $this;
    }



}

?>
