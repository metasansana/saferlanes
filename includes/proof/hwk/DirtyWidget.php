<?php
namespace proof\hwk;
/**
 * timestamp Jul 25, 2012 9:23:25 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\hwk
 *
 *  Interface for widgets that contain browser supplied data.
 *
 */
interface DirtyWidget extends Widget
{

    /**
     * Sets the sanitizer used to sanitize html ouput.
     */
    public function setHtmlSanitizer(HtmlSanitizer $s);

    /**
     * Returns the current HtmlSanitizer if any.
     */
    public function getHtmlSanitizer();

}