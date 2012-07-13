<?php

/**
 * timestamp Jul 10, 2012 9:22:55 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 *  Class for generating dynamic saferlanes links.
 *
 */

namespace saferlanes\models;

class Links
{

    /**
     * Internal reference to a WebPage object.
     * @var WebPage $page
     * @access private
     */
    private $page;

    public function __construct(WebPage &$page)
    {
        $this->page = $page;
    }


    public function generateVoteLinks($plate, $token)
    {
        $plus = "/vote/plus/$plate/$token";

        $minus = "/vote/minus/$plate/$token";

        $this->page->set('likes', $plus);

        $this->page->set('likes', $minus);

        return $this;
    }

}

?>
