<?php
namespace proof\hwk;

use proof\types\String;


require_once dirname(__FILE__) . '/../../../../proof/hwk/Page.php';

/**
 * Test class for Page.
 * Generated by PHPUnit on 2012-07-25 at 09:36:10.
 */
class PageTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Page
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        
        $this->object = new Page();

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers proof\hwk\Page::addImport
     * @todo Implement testAddImport().
     */
    public function testAddImport()
    {

        $this->assertSame($this->object, $this->object->addImport(new String("files")));

    }

    /**
     * @covers proof\hwk\Page::addWidget
     * @todo Implement testAddWidget().
     */
    public function testAddWidget()
    {
        $mock = $this->getMock("proof\hwk\AbstractWidget");
                $mock->expects($this->any())->method('getName')->will($this->returnValue('mock'));

        $this->assertSame($this->object, $this->object->addWidget($mock));

    }

    /**
     * @covers proof\hwk\Page::show
     *
     */
    public function testShow()
    {

        $this->assertTrue($this->object->show());
    }


}

?>
