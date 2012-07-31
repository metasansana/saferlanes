<?php
namespace proof\http;
/**
 * timestamp Jul 31, 2012 4:15:52 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\http
 *
 *  Sends a redirect header to the user's browser.
 *
 *
 */
class Redirect extends HttpCommand
{

   public function __construct($location)
   {

       $location = "Location: $location";

       parent::__construct($location);

   }

}