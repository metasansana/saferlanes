<?php
namespace proof\app;
/**
 * timestamp Jul 7, 2012 12:24:50 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\app
 *
 * Implementation of the Controller interface.
 *
 *
 */
use proof\util\AbstractObservable;
use proof\util\Map;


abstract class AbstractController extends AbstractObservable implements Controller
{

    /**
     * The next template the application should use.
     * @var string $next
     * @access protected
     */
    protected $next;

    /**
     * Collection of widgets to be displayed.
     * @var Map $content;
     */
    protected  $content;


   public function __construct()
   {

       parent::__construct();

       $this->content = new Map();
       

   }

   public function getContent()
   {
       return $this->content;
   }

   public function next()
   {
       return $this->next;
   }

}
