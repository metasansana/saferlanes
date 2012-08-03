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
use proof\util\ArrayList;
use proof\util\Map;
use proof\http\Location;


class PostController extends AbstractBrowserSubscriber
{

    const POST_FORM_TEMPLATE = "templates/post.php";

    public function onPath(Browser $browser, ArrayList $paths)
    {

        $page = $browser->getPage();

        $page->addTemplate(DefaultController::HEAD_TEMPLATE);
        $page->addTemplate(PostController::POST_FORM_TEMPLATE);
        $page->addTemplate(DefaultController::END_TEMPLATE);

        $page->show();

    }

    public function main(Options $opt = NULL)
    {

        $post = new Post();

        if ($post->contains('plate'))
        {

            $gen = new DriverGenerator();

            $gen->register($this->page);

            if ($gen->isValid($post->get('plate')))
            {
                $dfactory = new ActiveDatabaseFactory();

                $engine = new Engine($dfactory->getActiveDatabase());

                $driver = $gen->getDriver();

                $driver->setTimeStamp();

                if ($engine->createDriver($driver))
                {
                    new Redirect("/{$driver->getPlate()}", TRUE, TRUE);
                }
                else
                {
                    if($engine->getState() === Engine::DUPEX)
                        $this->page->render ('msg', new MessageBox('That driver is in the database already!'));

                    $this->page->import(Saferlanes::POST_TEMPLATE)->show();
                }
            }
            else
            {
                $this->page->import(Saferlanes::POST_TEMPLATE)->show();
            }
        }
        else
        {
            $this->page->import(Saferlanes::POST_TEMPLATE)->show();
        }

    }

}

?>
