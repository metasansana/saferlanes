<?php

/**
 * timestamp Jun 9, 2012 11:50:58 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 * Shows the profile of a tracked driver.
 *
 */

namespace saferlanes\models;

use callow\http\Session;
use callow\security\RandomToken;
use saferlanes\core\TrackedDriver;


class Report extends AbstractViewChanger
{

    private $driver;

    private $session;

    public function __construct(UserView &$view, TrackedDriver &$driver, Session &$session)
    {

        $this->driver = $driver;

        $this->session = $session;

        parent::__construct($view);

    }

    public function show()
    {

        $token = RandomToken::generate();

        $plate = &$this->driver->getPlate();

        $timestamp = &$this->driver->getTimeStamp();

        $likes = $this->driver->getPlus();

        $fails = $this->driver->getMinus();

        $plus_link = "/vote/plus/$plate/$token";

        $minus_link = "/vote/minus/$plate/$token";

        if($likes > $fails)
        {
            $image = "happy";
        }
        elseif ($likes  == $fails)
        {
            $image = "unsure";
        }
        else
        {
            $image = "sad";
        }

        $this->session->regenerate();

        $this->session->add('votekey', $token);

        $this->view->addMarkup('likes', $likes);

        $this->view->addMarkup( 'fails', $fails);

        $this->view->addMarkup('plus_link', $plus_link);

        $this->view->addMarkup('minus_link', $minus_link);

        $this->view->addMarkup('image', $image);

        $this->view->addMarkup('plate', $plate);

        $this->view->addMarkup('timestamp', $timestamp);

        $this->view->showDriverProfilePage();


    }
}

?>
