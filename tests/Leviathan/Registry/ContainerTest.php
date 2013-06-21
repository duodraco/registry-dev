<?php
namespace Leviathan\Registry;

class ContainerTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->object = new Container;
    }

    public function tearDown()
    {
        
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

    public function testStore()
    {
        $storeResult = $this->object->store('name', 'Registry');
        $this->assertEquals(true, $storeResult);
    }

    /**
     * @dataProvider storageProvider
     */
    public function testRetrieve($test)
    {
        $this->object->fill($test);
        $this->assertEquals('Leviathan', $this->object->retrieve('c:new:namespace'));
    }

    /**
     * @dataProvider storageProvider
     */
    public function testNonRetrieve($test)
    {
        $this->object->fill($test);
        $this->assertEquals(null, $this->object->retrieve('c:old:namespace'));
    }

    public function storageProvider()
    {
        return [
            [
                [
                    'a' => 'test 1',
                    'b' => 'test 2',
                    'c' => [
                        'new' => [
                            'namespace' => 'Leviathan'
                        ]
                    ]
                ],
                [
                    'a' => 'test 1',
                    'b' => 'test 2',
                    'c:new:namespace' => 'Leviathan'
                ]
            ]
        ];
    }
}
