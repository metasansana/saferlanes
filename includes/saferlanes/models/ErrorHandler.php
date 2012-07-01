<?php

/**
 * timestamp Jul 1, 2012 1:01:11 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  Handles errors/exceptions that occur during operation.
 *
 */

namespace saferlanes\models;

use saferlanes\ui\MessageBar;
use callow\galaxy\Error;


class ErrorHandler
{
    /**
     * The View object to be updated with error messages.
     * @var View $view
     * @access private
     */
    private $view;


    public function __construct(View &$view)
    {

        $this->view =$view;

    }

    public function handleError(Error $err, $exit=TRUE)
    {
            $this->view->addMarkup('msg', new MessageBar($err, 'error'));

            if($exit)
                exit();
    }


}

?>
