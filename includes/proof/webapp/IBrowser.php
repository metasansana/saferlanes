<?php
namespace proof\webapp;
/**
 * timestamp Jul 29, 2012 9:12:03 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for providing simulated control over the user's browser.
 *
 */
use proof\hwk\Page;

interface IBrowser
{

   public function checkInput();

   public function sendReply();

   public function getRequest();

   public function updatePage(Page $page);

   public function getPage();

   public function refresh();

}