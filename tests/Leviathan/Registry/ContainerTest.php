<?php
namespace Leviathan\Registry;

class ContainerTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        /**
         * @var Container
         */
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
    public function testRetrieve($test, $expected)
    {
        $expectedKey = key(array_reverse($expected));
        $this->object->fill($test);
        $this->assertEquals('Leviathan', $this->object->retrieve($expectedKey));
    }

    /**
     * @dataProvider storageProvider
     */
    public function testOffsetExists($test, $expected)
    {
        $expectedKey = key(array_reverse($expected));
        $this->object->fill($test);
        $this->assertInternalType('boolean', $this->object->offsetExists($expectedKey));
        $this->assertTrue(isset($this->object[$expectedKey]));
    }
    
    /**
     * @dataProvider storageProvider
     */
    public function testOffsetGet($test, $expected)
    {
        $expectedKey = key(array_reverse($expected));
        $this->object->fill($test);
        $this->assertInternalType('string', $this->object->offsetGet($expectedKey));
        $this->assertEquals($expected[$expectedKey], $this->object[$expectedKey]);
    }
    
    public function testOffsetSet()
    {
        $x = rand(1, 9999);
        $this->object->offsetSet('my:var', $x);
        $this->assertInternalType('int', $this->object->offsetGet('my:var'));
        $this->assertEquals($x, $this->object['my:var']);
    }
    
    /**
     * @dataProvider storageProvider
     */
    public function testOffsetUnset($test, $expected)
    {
        $expectedKey = key(array_reverse($expected));
        $this->object->fill($test);
        $expectedValue = $expected[$expectedKey];
        $this->object->offsetSet('my:var', rand(1, 9999));
        $this->assertInternalType('boolean', $this->object->offsetExists($expectedKey));
        $this->assertTrue(isset($this->object[$expectedKey]));
        $this->object->offsetUnset($expectedKey);
        $this->assertNull($this->object->offsetGet($expectedKey));
        $this->assertNotEquals($expectedValue, $this->object[$expectedKey]);
        $this->assertFalse(isset($this->object[$expectedKey]));
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
