<?php
namespace proof\webapp;

/**
 * timestamp May 5, 2012 9:00:02 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\app
 *
 * Controller is the interface for executing a use case of an application.
 *
 *
 */
use proof\util\Aggregate, proof\util\ArrayList, proof\util\Map;
use proof\hwk\Page;

interface Controller
{

   /**
    *  The main method of any controller class.
    * @param \proof\webapp\ArrayList $get                     Contents of the GET method
    * @param \proof\util\Map $post                                  Contenets of the POST method
    * @param \proof\util\Aggregate $opts                        Optional arguments passed internally
    */
    public function main(Page $page, ArrayList $get, Map $post, Aggregate $opts=NULL);


}