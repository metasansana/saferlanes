<?php

namespace proof\webapp;


require_once dirname(__FILE__) . '/../../../../proof/webapp/CompositeBrowserSubscriber.php';

/**
 * Test class for CompositeBrowserSubscriber.
 * Generated by PHPUnit on 2012-08-03 at 19:23:51.
 */
class CompositeBrowserSubscriberTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CompositeBrowserSubscriber
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new CompositeBrowserSubscriber;

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers proof\webapp\CompositeBrowserSubscriber::bind
     *
     */
    public function testBind()
    {

        $stub = $this->getMock(__NAMESPACE__."\\BrowserSubscriber");
        $this->assertInstanceOf(get_class($this->object), $this->object->bind($stub));

    }

}

?>
