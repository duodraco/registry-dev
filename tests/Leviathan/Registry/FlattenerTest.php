<?php
namespace Leviathan\Registry;

class FlattenerTest extends \PHPUnit_Framework_TestCase
{

    use DataProviderTrait;

    public function setUp()
    {
        /**
         * @var Container
         */
        $this->object = new Container;
    }

    public function tearDown()
    {
        $this->object = null;
    }

    /**
     * @dataProvider storageProvider
     */
    public function testFlatten($test, $expected)
    {
        $this->assertEquals(
            $expected,
            $this->object->flatten($test)
        );
    }
}
