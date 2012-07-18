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

    private $plate;

    protected $token;

    public function __construct($plate, $token)
    {
        $this->plate = $plate;
        $this->token = $token;
    }


    public  function getPlusLink()
    {
        return  "/vote/plus/{$this->plate}/{$this->token}";

    }

    public  function getMinusLink()
    {

        return  "/vote/minus/{$this->plate}/{$this->token}";


    }

}

?>
