<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 4:53:07 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Interface for listening to browser events.
 *
 */
interface BrowserEventListener
{

    public function onUrlChange(LocationChangedEvent $e);

    public function onPost(PostEvent $e);

}