<?php
namespace minphp\Container;

/**
 * @coversDefaultClass \minphp\Container\Container
 */
class ContainerTest extends \PHPUnit_Framework_TestCase
{
    private $Container;

    public function setUp()
    {
        $this->Container = new Container();
    }

    /**
     * @covers ::get
     */
    public function testGet()
    {
        $this->Container->set('id', 'value');
        $this->assertEquals('value', $this->Container->get('id'));
    }

    /**
     * @covers ::get
     * @expectedException \minphp\Container\Exception\NotFoundException
     */
    public function testGetException()
    {
        $this->assertEquals('value', $this->Container->get('non-existent-id'));
    }

    /**
     * @covers ::has
     */
    public function testHas()
    {
        $this->Container->set('id', 'value');
        $this->assertTrue($this->Container->has('id'));
        $this->assertFalse($this->Container->has('non-existent-id'));
    }

    /**
     * @covers ::set
     */
    public function testSet()
    {
        $this->Container->set(
            'queue',
            function($c) {
                return new \SplQueue();
            }
        );
        $queue = $this->Container->get('queue');
        $queue->enqueue('hello');

        $this->assertEquals('hello', $this->Container->get('queue')->dequeue());
    }

    /**
     * @covers ::remove
     */
    public function testRemove()
    {
        $this->Container->set('id', 'value');
        $this->assertTrue($this->Container->has('id'));

        $this->Container->remove('id');
        $this->assertFalse($this->Container->has('id'));
    }
}
