<?php

/**
 * timestamp Jul 12, 2012 9:40:58 PM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */

namespace saferlanes\models;

use saferlanes\core\Driver;

class VoteLinks
{

    protected $driver;

    protected $page;

    protected $token;

    public function __construct(WebPage &$page, Driver &$driver, $token)
    {
        $this->page = $page;
        $this->driver = $driver;
        $this->token = $token;
    }


    protected function putPlusLink($label='plus_link')
    {
        $plus = "/vote/plus/{$this->driver->getPlate()}/{$this->token}";

        $this->page->set($label, $plus);

        return $this;


    }

    protected function putMinusLink($label='minus_link')
    {

        $minus = "/vote/minus/{$this->driver->getPlate()}/{$this->token}";

        $this->page->set($label, $minus);

        return $this;
    }

    public function create()
    {
        $this->putMinusLink();
        $this->putPlusLink();

    }
}

?>
