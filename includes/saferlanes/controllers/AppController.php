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

use callow\app\Controller;
use saferlanes\models\View;



abstract  class AppController implements Controller
{

    /**
     *
     * @var Display $display
     * @access protected
     */
    protected $display;

    final public function __construct()
    {
        $this->display = new View(SL_TEMPLATE_PATH);
    }

}

?>
