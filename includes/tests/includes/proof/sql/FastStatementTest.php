<?php

namespace proof\sql;


require_once dirname(__FILE__) . '/../../../../proof/sql/FastStatement.php';

/**
 * Test class for FastStatement.
 * Generated by PHPUnit on 2012-08-04 at 13:22:55.
 */
class FastStatementTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FastStatement
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = $this->getMock
                (__NAMESPACE__ . '\\FastStatement',
                array ('SQL', $this->getMock('proof\sql\PDOProvider')));

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers proof\sql\FastStatement::fetch
     * @todo Implement testFetch().
     */
    public function testFetch()
    {

    }

    /**
     * @covers proof\sql\FastStatement::push
     * @todo Implement testPush().
     */
    public function testPush()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );

    }

}

?>
