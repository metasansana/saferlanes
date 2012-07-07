<?php

/**
 * timestamp Jul 7, 2012 8:31:29 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 * Class that manages the views for the saferlanes application.
 * This class has methods for the following phases:
 *
 */

namespace saferlanes\models;

use callow\app\AbstractWindow;
use callow\views\MessageBar;

class PageWindow extends AbstractWindow
{

    const POST = 'post';
    const SEARCH = 'search';
    const SHOW = 'display';
    const PATH = 'templates/';

    public function useTemplate($template)
    {

        if (!$template == PageWindow::POST | PageWindow::SEARCH | PageWindow::SHOW)
            throw new \Exception('Invalid template in use!');

        $this->template->setFilePath(PageWindow::PATH . $template . '.php');

    }

    public function promptMessage($msg)
    {

        $this->container->add('msg', $msg);

        return $this;

    }




}

?>
