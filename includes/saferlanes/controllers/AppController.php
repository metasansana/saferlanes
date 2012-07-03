<?php

/**
 * timestamp Jul 1, 2012 12:31:26 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *  Parent class of all controllers within the application.
 *
 */
namespace saferlanes\controllers;

use callow\app\Controller;
use saferlanes\models\UserView;
use saferlanes\models\ErrorHandler;



abstract  class AppController implements Controller
{

    /**
     * Internal View class
     * @var UserView $view
     * @access protected
     */
    protected $view;

    /**
     * Internal ErrorHandler class
     * @var ErrorHandeler $erhandler;
     *  @access protected
     */
    protected $erhandler;

    /**
     * Internal ExceptionHandler class
     * @var ExceptionHandler $exhandler;
     * @access protected
     */
    protected $exhandler;




    final public function __construct()
    {
        $this->view = new UserView();
        
        $this->erhandler = new ErrorHandler($this->view);
    }

}

?>
