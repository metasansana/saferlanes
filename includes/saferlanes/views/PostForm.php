<?php

/**
 * timestamp Jun 9, 2012 1:29:35 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\gui
 *
 *
 */

namespace saferlanes\gui;

use callow\http\Session;
use callow\security\RandomToken;
use callow\gui\ScreenWriter;
use callow\gui\Screen;

class PostForm extends ScreenWriter
{

      public function __construct(Screen &$screen)
    {

        $screen->setTemplate('post');

        parent::__construct($screen);

    }


    public function init()
    {

        $session = new Session();

        if($session->hasMember('csrf_token'))
        {
              $token = $session->get('csrf_token');
        }
        else
        {
             $token = RandomToken::generate();
        }

        $session->add($token, 'csrf_token');

        $this->screen->add($token, 'csrf_token');

        return $this;

    }

}

?>
