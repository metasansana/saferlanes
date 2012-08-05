<?php

namespace saferlanes;

/**
 * timestamp May 30, 2012 8:41:26 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *  Controller class for searching the database via an http post.
 *
 */
use proof\util\ArrayList,
    proof\util\Map;
use proof\webapp\AbstractBrowserSubscriber;
use proof\webapp\Browser;
use proof\webapp\Page;
use proof\sql\FetchList;
use proof\sql\SQLStatusListener;
use proof\security\RandomToken;
use proof\http\Session;

class SearchController extends AbstractBrowserSubscriber implements SQLStatusListener
{

    private function _goToSearchPage(Page $page)
    {

        $strategy = new PageStrategy($page);

        $strategy->toSearchPage();

        $strategy->getPage()->addContent('msg', new AlertBox(Messages::INVALID_PLATE_NUMBER))->show();

    }

    private function _goToProfileDisplay(FetchList $list, Page $page)
    {

        $config = new Config(Saferlanes::CONFIG_FILE);

        $site = $config->get('site');

        $session = new Session;

        $driver = new Driver($list->get(0)->toArray());
        $token = new RandomToken;

        $session->regenerate();

        $session->put("vote_key", "$token");

        $llink = "http://$site/vote/like/{$driver->getPlate()}/$token";
        $flink = "http://$site/vote/fail/{$driver->getPlate()}/$token";

        $page->addWidget(new DriverProfile($driver));
        $page->addContent('plus_link', $llink);
        $page->addContent('minus_link', $flink);
        $page->addContent('title', "Found: {$driver->getPlate()}");

        $strategy = new PageStrategy($page);
        $strategy->toDisplayPage();
        $strategy->getPage()->show();


    }

    public function onGet(Browser $browser, ArrayList $path, Map $args)
    {

        $pnum = new PlateNumber($path->get(0));

        if (!$pnum->isValid())
        {
            $this->_goToSearchPage($browser->getPage());
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
            else
            {
                $list = new FetchList();

                $pnum->findDriver($db->getConnection(), $list, $this);

                if ($list->size() > 0)
                {

                    $this->_goToProfileDisplay($list, $browser->getPage());
                }
                else
                {
                    $strategy = new PageStrategy($browser->getPage());

                    $strategy->toSearchPage();

                    $strategy->getPage()->
                            addContent('msg', new NoticeBox(Messages::UNKNOWN_PLATE_NUMBER))->show();
                }
            }
        }

    }

    public function onChange(\proof\sql\PDOProvider $provider, \proof\sql\SQLStatus $status)
    {

        //@todo  please use a class!
        header('Status: 500 Internal Server Error');
        exit();

    }

}