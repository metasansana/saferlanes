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


abstract class AppLogicController extends AbstractObservable implements LogicController
{

    /**
     * The next (if any) LogicController that should be put on the stack.
     * @var LogicController $next
     * @access protected
     */
    protected $next;

    /**
     * Arguments for the controller
     * @var ArrayList $args
     */
    protected $args;

    /**
     * Widget
     * @var Widget $content;
     */
    protected  $content;

    /**
     *A request to import a new template
     * @var string template
     */
    protected $template;


   public function getContent()
   {
       return $this->content;
   }

   public function next()
   {
       return $this->next;
   }

   public function getTemplate()
   {
       return $this->template;
   }

   public function getArgs()
   {
       return $this->args;
   }

}