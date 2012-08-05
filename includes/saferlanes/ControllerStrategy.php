<?php
namespace saferlanes;
/**
 * timestamp Jul 31, 2012 10:18:33 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *  Strategy pattern for loading controller classes.
 *
 */
class ControllerStrategy
{

    /**
     *
     * @var
     * @access
     */
    private $controller;

    public function useSearch()
    {

        $this->controller = new SearchController;

        return $this;

    }

    public function useSearchForm()
    {
        $this->controller = new SearchFormController;
        return $this;
    }

    public function useVote()
    {

        $this->controller = new VoteController;
        return $this;

    }

    public function usePost()
    {

        $this->controller = new PostController;
        return $this;

    }

    public function useDefault()
    {
        $this->controller = new DefaultController;
        return $this;
    }


    public function getController()
    {
        return $this->controller;
    }

}