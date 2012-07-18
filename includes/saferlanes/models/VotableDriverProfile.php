<?php

/**
 * timestamp Jul 15, 2012 2:24:31 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\util
 *
 *
 */

namespace saferlanes\models;

use saferlanes\core\Driver;

class VotableDriverProfile extends DriverProfile
{

    protected $token;


    public function __construct(Driver &$driver, $token)
    {
        $this->token = $token;
        parent::__construct($driver);
    }

  protected  function getPlusLink()
    {
        return  "/vote/plus/{$this->driver->getPlate()}/{$this->token}";

    }

   protected  function getMinusLink()
    {

        return  "/vote/minus/{$this->driver->getPlate()}/{$this->token}";

    }

    public function create()
    {
        $this->changes->add('minus_link', $this->getMinusLink());

        $this->changes->add('plus_link', $this->getPlusLink());

        return parent::create();
    }

}

?>
