<?php

/**
 * timestamp Jul 7, 2012 8:31:29 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\models
 *
 * Class that manages the views for the saferlanes application.
 *
 *
 */

namespace callow\app;

use callow\html\Template;
use callow\html\HTMLContainer;
use callow\util\EventListener;



class Page extends EventListener implements Window
{

    private $template;

    /**
     * Internal HTMLContainer object
     * @var HTMLContainer
     */
    private $container;

    public function __construct()
    {

        $this->container = new HTMLContainer();

    }

    public function render($label, $html)
    {

        $this->container->add($label, (string)$html);

        return $this;
    }

    public function update(BrowserUpdate $bu)
    {
        $updates = $bu->getChanges()->__toArray();

        foreach ($updates as $label=>&$code)
        {
            $this->render($label, $code);
        }



    }



public function import($name)
{

    if(!$this->template)
        $this->template = new Template();

        $this->template->addTemplate("$name");

        return $this;

}

public function getTemplate()
{
    return $this->template;
}

public function show()
{

    $this->template->setContainer($this->container)->enable();

}


}

?>

