<?php
namespace proof\webapp;
/**
 * timestamp Jul 30, 2012 4:54:36 AM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 *  Event triggered whenever the location requested changes (this is always triggered).
 *
 *
 */
use proof\util\ArrayList;

class LocationChangedEvent extends BrowserEvent
{

    /**
     * The path requested.
     * @var proof\util\ArrayList $path
     * @access
     */
    private $path;

    public function __construct(Browser $src, ArrayList $path)
    {
        $this->path = $path;

        parent::__construct($src);

    }

    /**
     * Returns the path requested.
     * @return proof\util\ArrayList  The path of the url requested.
     */
    public function getPath()
    {
        return $this->getPath();
    }

}