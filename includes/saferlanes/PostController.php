<?php

namespace saferlanes;

/**
 * timestamp May 30, 2012 5:09:21 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controlles;
 *
 *  Controller for posting new drivers;
 *
 */
use proof\webapp\AbstractBrowserSubscriber;
use proof\webapp\Browser;
use proof\webapp\Page;
use proof\util\ArrayList;
use proof\util\Map;
use proof\http\Location;
use proof\sql\SQLStatusListener;

class PostController extends AbstractBrowserSubscriber implements SQLStatusListener
{

    private $browser;



     private function _goToPostPage(Page $page)
    {

        $strategy = new PageStrategy($page);

        $strategy->toPostPage();

        $strategy->getPage()->addContent('msg', new AlertBox(Messages::INVALID_PLATE_NUMBER))->show();

    }

    public function onGet(Browser $browser, ArrayList $path, Map $args)
    {

        $strategy = new PageStrategy($browser->getPage());

        $strategy->toPostPage();

        $strategy->getPage()->show();

    }

    public function onPost(Browser $browser, ArrayList $path, Map $post)
    {

        if (!$post->indexAt('plate'))
        {
            $location = new Location('/');
            $location->send();
        }
        else
        {
            $pnum = new PlateNumber($post->get('plate'));

            if (!$pnum->isValid())
            {
                $page = $browser->getPage();
                $this->_goToPostPage($page);
            }
            else
            {

            $config = new Config(Saferlanes::CONFIG_FILE);

            $db = new Database($config->get('db_dsn'), $config->get('db_user'), $config->get('db_password'));

            if (!$db->connect())
            {
                //@todo  please use a class!
                header('Status: 500 Internal Server Error');
                exit();
            }

            $this->browser = $browser;

            $flag = $pnum->store($db->getConnection(), $this);

            if(!$flag === 1)
                die('Post error!');

            mail($config->get('admin'), "New post", Alerts::getPostMessage("$pnum"));

           $location = new Location("/$pnum");
           $location->send();




            }

        }

    }

    public function onChange(\proof\sql\PDOProvider $provider, \proof\sql\SQLStatus $status)
    {

        if($status->getState() == 23000)
        {

        $strategy = new PageStrategy($this->browser->getPage());

        $strategy->toPostPage();

        $strategy->getPage()->addContent('msg', new AlertBox(Messages::DUPLICATE_PLATE_NUMBER))->show();

        exit;

        }
        else
        {
            header("Status: 500 Internal Server Error");
            die('Service down!');
        }


    }

}