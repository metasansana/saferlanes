<?php

namespace saferlanes;

/**
 * timestamp Aug 4, 2012 8:42:58 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *
 */
use proof\webapp\AbstractBrowserSubscriber;
use proof\util\ArrayList;
use proof\util\Map;
use proof\webapp\Browser;

class SearchFormController extends AbstractBrowserSubscriber
{

    public function onPost(Browser $browser, ArrayList $path, Map $post)
    {

        if ($post->indexAt('plate'))
        {

            $plate = new PlateNumber($post->get('plate'));

            if ($plate->isValid())
            {

                $location = new \proof\http\Location("/{$plate->getPlate()}");
                $location->send();
            }
            else
            {

                $strategy = new PageStrategy($browser->getPage());

                $strategy->toSearchPage();

                $strategy->getPage()->addContent('msg', new AlertBox(Messages::INVALID_PLATE_NUMBER))->show();
            }

        }
        else
        {

            $location = new \proof\http\Location("/");
            $location->send();
        }

    }

}