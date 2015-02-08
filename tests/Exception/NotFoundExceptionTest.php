<?php
namespace minphp\Container\Exception;

/**
 * @coversDefaultClass \minphp\Container\Exception\NotFoundException
 */
class NotFoundExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('\Interop\Container\Exception\NotFoundException', new NotFoundException());
    }
}
