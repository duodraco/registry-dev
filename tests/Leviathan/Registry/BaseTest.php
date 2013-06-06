<?php
namespace Leviathan\Registry;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    protected $test = [
        'a' => 'test 1',
        'b' => 'test 2',
        'c' => [
            'new' => [
                'namespace' => 'Leviathan'
            ]
        ]
    ];
    protected $expected = [
        'a' => 'test 1',
        'b' => 'test 2',
        'c:new:namespace' => 'Leviathan'
    ];

    public function setUp()
    {
        $this->object = new Base();
    }

    public function tearDown()
    {
    }

    public function testFlatten()
    {
        $this->assertEquals(
            $this->expected,
            $this->object->flatten($this->test)
        );
    }
    public function testStore()
    {
	$storeResult = $this->object->store('name','Registry');
	$this->assertEquals(true,$storeResult);
    }
    public function testRetrieve()
    {
        $this->object->fill($this->test);
        $this->assertEquals('Leviathan',$this->object->retrieve('c:new:namespace'));
    }
    public function testNonRetrieve()
    {
        $this->object->fill($this->test);
        $this->assertEquals(null,$this->object->retrieve('c:old:namespace'));
    }
}
