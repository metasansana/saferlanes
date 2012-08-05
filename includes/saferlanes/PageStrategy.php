<?php
namespace saferlanes;
/**
 * timestamp Aug 4, 2012 3:44:24 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes
 *
 *  Strategy pattern for changing the page template.
 *
 */
use proof\webapp\Page;

class PageStrategy
{

    private $page;

    public  function __construct(Page $page)
    {
        $this->page = $page;

    }


    public function toSearchPage()
    {
        $this->page->addTemplate(Templates::HEAD_TEMPLATE);
        $this->page->addTemplate(Templates::SEARCH_FORM_TEMPLATE);
        $this->page->addTemplate(Templates::END_TEMPLATE);

        $this->page->addContent("title", "Saferlanes:  Reputation tracker for the nation's roadways");

        return $this;
    }

    public function toPostPage()
    {

        $this->page->addTemplate(Templates::HEAD_TEMPLATE);
        $this->page->addTemplate(Templates::POST_FORM_TEMPLATE);
        $this->page->addTemplate(Templates::END_TEMPLATE);

        $this->page->addContent("title", "Saferlanes:  Create a new entry");

        return $this;

    }

    public function toDisplayPage()
    {
        $this->page->addTemplate(Templates::HEAD_TEMPLATE);
        $this->page->addTemplate(Templates::PROFILE_DISPLAY_TEMPLATE);
        $this->page->addTemplate(Templates::END_TEMPLATE);

        return $this;
    }

    /**
     *
     * @return proof\webapp\Page
     */
    public function getPage()
    {
        return $this->page;
    }

}