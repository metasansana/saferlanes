<?php

namespace proof\webapp;


require_once dirname(__FILE__) . '/../../../../proof/webapp/BrowserInputDispatcher.php';

/**
 * Test class for BrowserInputDispatcher.
 * Generated by PHPUnit on 2012-08-01 at 07:46:25.
 */
class BrowserInputDispatcherTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BrowserInputDispatcher
     */
    protected $object;

    /**
     *
     * @var BrowserSubscriber
     */
    protected $sub;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new BrowserInputDispatcher;
        $this->sub = $this->getMock('proof\webapp\BrowserSubscriber');


    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers proof\webapp\BrowserInputDispatcher::bind
     * @todo Implement testBind().
     */
    public function testBind()
    {
        

    }

    /**
     * @covers proof\webapp\BrowserInputDispatcher::onGet
     * @todo Implement testOnGet().
     */
    public function testOnGet()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );

    }

    /**
     * @covers proof\webapp\BrowserInputDispatcher::onPath
     * @todo Implement testOnPath().
     */
    public function testOnPath()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );

    }

    /**
     * @covers proof\webapp\BrowserInputDispatcher::onPost
     * @todo Implement testOnPost().
     */
    public function testOnPost()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );

    }

}

?>
