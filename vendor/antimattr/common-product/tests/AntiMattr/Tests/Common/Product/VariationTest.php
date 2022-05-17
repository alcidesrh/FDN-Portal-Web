<?php

namespace AntiMattr\Tests\Common\Product;

use AntiMattr\Common\Product\Variation;
use AntiMattr\TestCase\AntiMattrTestCase;

class VariationTest extends AntiMattrTestCase
{
    private $variation;

    protected function setUp()
    {
        $this->variation = new Variation();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('AntiMattr\Common\Product\ProductInterface', $this->variation);
        $this->assertInstanceOf('AntiMattr\Common\Product\Product', $this->variation);
        $this->assertInstanceOf('AntiMattr\Common\Product\ProductInterface', $this->variation);
        $this->assertNull($this->variation->getImage());
        $this->assertNotNull($this->variation->getMeta());
        $this->assertNotNull($this->variation->getOptions());
        $this->assertNull($this->variation->getPosition());
        $this->assertNull($this->variation->getProduct());
        $this->assertNull($this->variation->getUniqueIdentifier());
    }

    public function testSettersGetters()
    {
        $product = $this->buildMock('AntiMattr\Common\Product\Product');
        $this->variation->setProduct($product);

        $this->assertEquals($product, $this->variation->getProduct());

        $image = $this->buildMock('AntiMattr\Common\Product\Image');
        $this->variation->setImage($image);

        $this->assertEquals($image, $this->variation->getImage());

        $meta = $this->getMock('ArrayAccess');
        $this->variation->setMeta($meta);
        $this->assertEquals($meta, $this->variation->getMeta());

        $options = $this->getMock('Doctrine\Common\Collections\Collection');
        $this->variation->setOptions($options);
        $this->assertEquals($options, $this->variation->getOptions());

        $option = $this->buildMock('AntiMattr\Common\Product\Option');
        $options->expects($this->once())
            ->method('contains')
            ->with($option)
            ->will($this->returnValue(true));
        $this->assertTrue($this->variation->hasOption($option));

        $options->expects($this->once())
            ->method('removeElement')
            ->with($option)
            ->will($this->returnValue(true));
        $this->variation->removeOption($option);

        $option2 = $this->buildMock('AntiMattr\Common\Product\Option');

        $option2->expects($this->once())
            ->method('getVariation')
            ->will($this->returnValue(null));

        $option2->expects($this->once())
            ->method('setVariation')
            ->with($this->variation);

        $this->variation->addOption($option2);

        $position = 1;
        $this->variation->setPosition($position);
        $this->assertEquals($position, $this->variation->getPosition());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetPositionWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->variation->setPosition($decimal);
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testRemoveUnknownOptionThrowsOutOfBoundsException()
    {
        $element = $this->buildMock('AntiMattr\Common\Product\Option');
        $this->variation->removeOption($element);
    }

    public function testGetUniqueIdentifier()
    {
        // Regardless of option order, the identifier should be alphabetized
        // This ensures options in different order, produce the same identifier
        $expectedIdentifier = "foo1_bar1_foo2_bar2_foo3_bar3";

        $option1 = $this->buildMock('AntiMattr\Common\Product\Option');
        $option2 = $this->buildMock('AntiMattr\Common\Product\Option');
        $option3 = $this->buildMock('AntiMattr\Common\Product\Option');

        $this->variation->addOption($option1);
        $this->variation->addOption($option2);
        $this->variation->addOption($option3);

        $option1->expects($this->once())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('foo1_bar1'));

        $option2->expects($this->once())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('foo3_bar3'));

        $option3->expects($this->once())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('foo2_bar2'));

        $this->assertEquals($expectedIdentifier, $this->variation->getUniqueIdentifier());
    }
}
