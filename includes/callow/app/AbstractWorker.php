<?php

/**
 * timestamp Jul 14, 2012 5:39:43 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  Implementation of the Worker interface.
 *
 */

namespace callow\app;

class AbstractWorker implements Worker
{

    /**
     * An object that listens for internal Events
     * @var InternalEventListener $iel
     * @access protected
     */
    protected  $iel;

    /**
     * An object that listens for Browser headed changes.
     * @var BrowserUpdateListener $bul
     * @access protected
     */
    protected  $bul;

    public function __construct(BrowserUpdateListener &$bul = NULL, InternalEventListener &$iel = NULL)
    {
        if($bul)
            $this->setBrowserUpdateListener ($bul);

        if($iel)
            $this->setInternalEventListener ($iel);
    }

    public function setBrowserUpdateListener(BrowserUpdateListener &$bul)
    {
        $this->bul = $bul;
        return $this;
    }

    public function setInternalEventListener(InternalEventListener &$icl)
    {
        $this->iel = $icl;
        return $this;
    }

}

?>
