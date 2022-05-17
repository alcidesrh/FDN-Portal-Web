<?php

namespace AntiMattr\Tests\Common\Product;

use AntiMattr\Common\Product\Option;
use AntiMattr\TestCase\AntiMattrTestCase;

class OptionTest extends AntiMattrTestCase
{
    private $option;

    protected function setUp()
    {
        $this->option = new Option();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('AntiMattr\Common\Product\OptionInterface', $this->option);
        $this->assertNull($this->option->getAttribute());
        $this->assertNotNull($this->option->getMeta());
        $this->assertNull($this->option->getValue());
        $this->assertEquals('', $this->option->getCanonicalValue());
        $this->assertNull($this->option->getVariation());
    }

    public function testSettersGetters()
    {
        $attribute = $this->buildMock('AntiMattr\Common\Product\Attribute');
        $this->option->setAttribute($attribute);
        $this->assertEquals($attribute, $this->option->getAttribute());

        $meta = $this->getMock('ArrayAccess');
        $this->option->setMeta($meta);
        $this->assertEquals($meta, $this->option->getMeta());

        $value = 'value';
        $this->option->setValue($value);
        $this->assertEquals($value, $this->option->getValue());

        $variation = $this->buildMock('AntiMattr\Common\Product\Variation');
        $this->option->setVariation($variation);
        $this->assertEquals($variation, $this->option->getVariation());
    }

    public function testGetCanonicalValue()
    {
        $value = "ReD+++! 11";
        $this->option->setValue($value);

        $expectedValue = 'red_11';
        $this->assertEquals($expectedValue, $this->option->getCanonicalValue());
    }

    public function testGetUniqueIdentifier()
    {
        $expectedIdentifier = "foo1_bar1";

        $attribute = $this->buildMock('AntiMattr\Common\Product\Attribute');
        $this->option->setAttribute($attribute);

        $attribute->expects($this->once())
            ->method('getCanonicalName')
            ->will($this->returnValue('foo1'));

        $value = 'BaR1!';
        $this->option->setValue($value);

        $this->assertEquals($expectedIdentifier, $this->option->getUniqueIdentifier());
    }
}
