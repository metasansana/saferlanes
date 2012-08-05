<?php
namespace saferlanes;
/**
 * timestamp May 31, 2012 9:43:16 PM
 *
 *
 * @project roadtroll
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */
use proof\webapp\AbstractBrowserSubscriber;
use proof\util\ArrayList;
use proof\util\Map;
use proof\http\Location;
use proof\http\Session;
use proof\sql\SQLStatusListener;
use proof\webapp\Browser;



class VoteController extends AbstractBrowserSubscriber implements SQLStatusListener
{


    public function onGet(Browser $browser, ArrayList $path, Map $args)
    {

        if(!$path->size() === 4)
            die('perror');

        $session = new Session;

        $key = $session->get('vote_key');

        if(!$key)
            die('Cookies must be enable to vote!');

        if(!$path->get(3) === $key)
            die('CSRF detected!');

           $plate = new PlateNumber($path->get(2));

           if(!$plate->isValid())
               die('Plate number not valid!');

            $config = new Config(Saferlanes::CONFIG_FILE);

            $db = new Database($config->get('db_dsn'), $config->get('db_user'), $config->get('db_password'));

            if (!$db->connect())
            {
                //@todo  please use a class!
                header('Status: 500 Internal Server Error');
                exit();
            }

            $vote = $path->get(1);

            if($vote === 'like')
            {
                $flag = $plate->like($db->getConnection (), $this);
            }
            elseif($vote === 'fail')
            {
                $flag = $plate->fail ($db->getConnection (), $this);
            }
            else
            {
                die('Invalid URL!');
            }

            if($flag != 1)
                die('Voting error');

            mail($config->get('admin'), "New post", Alerts::getVoteMessage("$pnum", $vote));

            $location = new Location("/".$path->get(2));

            $location->send();


    }


    public function onChange(\proof\sql\PDOProvider $provider, \proof\sql\SQLStatus $status)
    {

        die('Voting error again!');

    }



}

?>
