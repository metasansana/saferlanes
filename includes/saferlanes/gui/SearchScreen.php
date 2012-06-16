<?php

/**
 * timestamp May 31, 2012 4:55:07 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\gui
 *
 *
 */

namespace saferlanes\gui;

use callow\mvc\Screen;
use saferlanes\core\domain\Driver;
use callow\http\Session;
use callow\security\RandomToken;
use callow\domain\InvalidPropertyException;


class SearchScreen extends Screen
{

    private $session;

    public function __construct()
    {

    }

    public function registerSession(Session &$session)
    {
        $this->session = $session;

    }

    public function init()
    {

        $this->unlock();

        $this->setTemplate('search');

    }

    public function acceptValidationError(BadValueException &$error)
    {

        $this->init();
        $msg = "<div class='error'>{$error->getMessage()}</div>";
        $this->add($msg, $error->getPropertyName());

    }

    public function assumeNotFound()
    {
        $this->init();
        $msg = "<div class='error'>That plate is not in the database yet!</div>";
        $this->add($msg, 'plate');

    }

    public function printDriver(Driver &$driver)
    {

        $this->unlock();

        $this->setTemplate('display');

        $this->session->regenerate(TRUE);

        $tgen = new RandomToken();

        $token = $tgen->generate();

        $this->session->add($token, 'vote_key');

        $this->add($driver->getPlate(), 'plate');

        $this->add($driver->getTimeStamp(), 'timestamp');

        $plus =
        "<div class='span-12 vbox'><a href='/vote/plus/{$driver->getPlate()}/$token'>+</a>{$driver->getPlus()}</div>";

        $minus =
        "<div class='span-12 vbox last'><a href='/vote/minus/{$driver->getPlate()}/$token'>-</a>{$driver->getMinus()}</div>";

        $this->add($plus, 'plus');

        $this->add($minus, 'minus');

    }

}

?>
