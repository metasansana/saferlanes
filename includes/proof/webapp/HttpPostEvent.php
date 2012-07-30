<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 5:22:48 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 * Triggered when a new http post is received.
 *
 * Purpose:
 * Alerts classes that an http post came through.
 *
 *
 */
use proof\util\Map;

class HttpPostEvent extends BrowserEvent
{

    /**
     * The http post arguments.
     * @var proof\util\Map;
     * @access private
     */
    private $post;

    public function __constuct(Browser $brwser, Map $post)
    {
        parent::__constuct($brwser);
        $this->post = $post;

    }

    public function getPost()
    {
        return $this->post;
    }



}