<?php
namespace proof\sql;
/**
 * timestamp Aug 2, 2012 8:09:39 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package
 *
 *
 */
abstract class AbstractPDOProviderWrapper implements PDOProvider
{

    /**
     * Internally stored provider
     * @var proof\sql\PDOProvider $provider
     * @access protected
     */
    protected $provider;

    public function __construct(PDOProvider $provider)
    {
        $this->provider = $provider;

    }

}