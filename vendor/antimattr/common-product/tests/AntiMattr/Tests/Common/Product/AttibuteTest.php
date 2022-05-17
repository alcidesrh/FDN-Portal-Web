<?php

namespace AntiMattr\Tests\Common\Product;

use AntiMattr\Common\Product\Attribute;
use AntiMattr\TestCase\AntiMattrTestCase;

class AttibuteTest extends AntiMattrTestCase
{
    private $attribute;

    protected function setUp()
    {
        $this->attribute = new Attribute();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('AntiMattr\Common\Product\AttributeInterface', $this->attribute);
        $this->assertEquals('', $this->attribute->getCanonicalName());
        $this->assertNull($this->attribute->getId());
        $this->assertNotNull($this->attribute->getMeta());
        $this->assertNull($this->attribute->getName());
        $this->assertNotNull($this->attribute->getOptions());
    }

    public function testSettersGetters()
    {
        $id = 'id';
        $this->attribute->setId($id);
        $this->assertEquals($id, $this->attribute->getId());

        $meta = $this->getMock('ArrayAccess');
        $this->attribute->setMeta($meta);
        $this->assertEquals($meta, $this->attribute->getMeta());

        $name = 'name';
        $this->attribute->setName($name);
        $this->assertEquals($name, $this->attribute->getName());

        $options = $this->getMock('Doctrine\Common\Collections\Collection');
        $this->attribute->setOptions($options);
        $this->assertEquals($options, $this->attribute->getOptions());

        $option = $this->buildMock('AntiMattr\Common\Product\Option');
        $options->expects($this->once())
            ->method('contains')
            ->with($option)
            ->will($this->returnValue(true));
        $this->assertTrue($this->attribute->hasOption($option));

        $options->expects($this->once())
            ->method('removeElement')
            ->with($option)
            ->will($this->returnValue(true));
        $this->attribute->removeOption($option);

        $option2 = $this->buildMock('AntiMattr\Common\Product\Option');

        $option2->expects($this->once())
            ->method('getAttribute')
            ->will($this->returnValue(null));

        $option2->expects($this->once())
            ->method('setAttribute')
            ->with($this->attribute);

        $this->attribute->addOption($option2);
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testRemoveUnknownOptionThrowsOutOfBoundsException()
    {
        $element = $this->buildMock('AntiMattr\Common\Product\Option');
        $this->attribute->removeOption($element);
    }

    public function testGetCanonicalName()
    {
        $name = "ColOR+++! 33";
        $this->attribute->setName($name);

        $expectedName = 'color_33';
        $this->assertEquals($expectedName, $this->attribute->getCanonicalName());
    }
}
