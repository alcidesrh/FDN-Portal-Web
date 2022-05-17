<?php

namespace AntiMattr\Tests\Common\Product;

use AntiMattr\Common\Product\Product;
use AntiMattr\Common\Product\Variation;
use AntiMattr\TestCase\AntiMattrTestCase;

class ProductTest extends AntiMattrTestCase
{
    private $product;

    protected function setUp()
    {
        $this->product = new Product();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('AntiMattr\Common\Product\ProductInterface', $this->product);
        $this->assertNotNull($this->product->getAttributes());
        $this->assertNull($this->product->getCreatedAt());
        $this->assertNull($this->product->getCurrency());
        $this->assertNull($this->product->getDescription());
        $this->assertNull($this->product->getDimensionUnit());
        $this->assertNull($this->product->getEan());
        $this->assertNull($this->product->getHeight());
        $this->assertNull($this->product->getId());
        $this->assertNotNull($this->product->getImages());
        $this->assertNull($this->product->getLength());
        $this->assertNotNull($this->product->getMeta());
        $this->assertNull($this->product->getMsrp());
        $this->assertNull($this->product->getPrice());
        $this->assertNull($this->product->getPublishedAt());
        $this->assertNull($this->product->getQuantity());
        $this->assertNull($this->product->getSku());
        $this->assertNull($this->product->getStatus());
        $this->assertNull($this->product->getTitle());
        $this->assertNull($this->product->getUpc());
        $this->assertNull($this->product->getUpdatedAt());
        $this->assertNotNull($this->product->getVariations());
        $this->assertNull($this->product->getWeight());
        $this->assertNull($this->product->getWeightUnit());
        $this->assertNull($this->product->getWidth());
    }

    public function testSettersGetters()
    {
        $attributes = $this->getMock('Doctrine\Common\Collections\Collection');
        $this->product->setAttributes($attributes);
        $this->assertEquals($attributes, $this->product->getAttributes());

        $attribute = $this->buildMock('AntiMattr\Common\Product\Attribute');
        $attributes->expects($this->once())
            ->method('contains')
            ->with($attribute)
            ->will($this->returnValue(true));
        $this->assertTrue($this->product->hasAttribute($attribute));

        $attributes->expects($this->once())
            ->method('removeElement')
            ->with($attribute)
            ->will($this->returnValue(true));
        $this->product->removeAttribute($attribute);

        $createdAt = $this->createDateTime();
        $this->product->setCreatedAt($createdAt);
        $this->assertEquals($createdAt, $this->product->getCreatedAt());

        $currency = 'USD';
        $this->product->setCurrency($currency);
        $this->assertEquals($currency, $this->product->getCurrency());

        $description = 'description';
        $this->product->setDescription($description);
        $this->assertEquals($description, $this->product->getDescription());

        $dimensionUnit = 'dimensionUnit';
        $this->product->setDimensionUnit($dimensionUnit);
        $this->assertEquals($dimensionUnit, $this->product->getDimensionUnit());

        $ean = 'ean';
        $this->product->setEan($ean);
        $this->assertEquals($ean, $this->product->getEan());

        $height = 2;
        $this->product->setHeight($height);
        $this->assertEquals($height, $this->product->getHeight());

        $id = 'id';
        $this->product->setId($id);
        $this->assertEquals($id, $this->product->getId());

        $images = $this->getMock('Doctrine\Common\Collections\Collection');
        $this->product->setImages($images);
        $this->assertEquals($images, $this->product->getImages());

        $image = $this->buildMock('AntiMattr\Common\Product\Image');
        $images->expects($this->once())
            ->method('contains')
            ->with($image)
            ->will($this->returnValue(true));
        $this->assertTrue($this->product->hasImage($image));

        $images->expects($this->once())
            ->method('removeElement')
            ->with($image)
            ->will($this->returnValue(true));
        $this->product->removeImage($image);

        $image2 = $this->buildMock('AntiMattr\Common\Product\Image');

        $image2->expects($this->once())
            ->method('getProduct')
            ->will($this->returnValue(null));

        $image2->expects($this->once())
            ->method('setProduct')
            ->with($this->product);

        $this->product->addImage($image2);

        $length = 3;
        $this->product->setLength($length);
        $this->assertEquals($length, $this->product->getLength());

        $meta = $this->getMock('ArrayAccess');
        $this->product->setMeta($meta);
        $this->assertEquals($meta, $this->product->getMeta());

        $mpn = 'mpn';
        $this->product->setMpn($mpn);
        $this->assertEquals($mpn, $this->product->getMpn());

        $msrp = 88;
        $this->product->setMsrp($msrp);
        $this->assertEquals($msrp, $this->product->getMsrp());

        $price = 100;
        $this->product->setPrice($price);
        $this->assertEquals($price, $this->product->getPrice());

        $publishedAt = $this->createDateTime();
        $this->product->setPublishedAt($publishedAt);
        $this->assertEquals($publishedAt, $this->product->getPublishedAt());

        $quantity = 10;
        $this->product->setQuantity($quantity);
        $this->assertEquals($quantity, $this->product->getQuantity());

        $sku = 'sku';
        $this->product->setSku($sku);
        $this->assertEquals($sku, $this->product->getSku());

        $status = 'status';
        $this->product->setStatus($status);
        $this->assertEquals($status, $this->product->getStatus());

        $title = 'title';
        $this->product->setTitle($title);
        $this->assertEquals($title, $this->product->getTitle());

        $upc = 'upc';
        $this->product->setUpc($upc);
        $this->assertEquals($upc, $this->product->getUpc());

        $updatedAt = $this->createDateTime();
        $this->product->setUpdatedAt($updatedAt);
        $this->assertEquals($updatedAt, $this->product->getUpdatedAt());

        $variations = $this->getMock('Doctrine\Common\Collections\Collection');
        $this->product->setVariations($variations);
        $this->assertEquals($variations, $this->product->getVariations());

        $variation = $this->buildMock('AntiMattr\Common\Product\Variation');
        $variations->expects($this->once())
            ->method('contains')
            ->with($variation)
            ->will($this->returnValue(true));
        $this->assertTrue($this->product->hasVariation($variation));

        $variations->expects($this->once())
            ->method('removeElement')
            ->with($variation)
            ->will($this->returnValue(true));
        $this->product->removeVariation($variation);

        $variation2 = $this->buildMock('AntiMattr\Common\Product\Variation');

        $variation2->expects($this->once())
            ->method('getProduct')
            ->will($this->returnValue(null));

        $variation2->expects($this->once())
            ->method('setProduct')
            ->with($this->product);

        $this->product->addVariation($variation2);

        $weight = 4;
        $this->product->setWeight($weight);
        $this->assertEquals($weight, $this->product->getWeight());

        $weightUnit = 'weightUnit';
        $this->product->setWeightUnit($weightUnit);
        $this->assertEquals($weightUnit, $this->product->getWeightUnit());

        $width = 5;
        $this->product->setWidth($width);
        $this->assertEquals($width, $this->product->getWidth());
    }

    public function testIsVariationUnique()
    {
        // Variations Empty
        $variation1 = $this->buildMock('AntiMattr\Common\Product\Variation');
        $this->assertTrue($this->product->isVariationUnique($variation1));

        $variation2 = new Variation();
        $variation2Option1 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation2Option2 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation2Option3 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation2->addOption($variation2Option1);
        $variation2->addOption($variation2Option2);
        $variation2->addOption($variation2Option3);

        $variation3 = new Variation();
        $variation3Option1 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation3Option2 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation3Option3 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation3->addOption($variation3Option1);
        $variation3->addOption($variation3Option2);
        $variation3->addOption($variation3Option3);

        $variation4 = new Variation();
        $variation4Option1 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation4Option2 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation4Option3 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation4->addOption($variation4Option1);
        $variation4->addOption($variation4Option2);
        $variation4->addOption($variation4Option3);

        $variation3Duplicate = new Variation();
        $variation3DuplicateOption1 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation3DuplicateOption2 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation3DuplicateOption3 = $this->buildMock('AntiMattr\Common\Product\Option');
        $variation3Duplicate->addOption($variation3DuplicateOption1);
        $variation3Duplicate->addOption($variation3DuplicateOption2);
        $variation3Duplicate->addOption($variation3DuplicateOption3);

        $variation2Option1->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('color_red'));
        $variation2Option2->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('size_small'));
        $variation2Option3->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('fabric_cotton'));

        $variation3Option1->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('color_yellow'));
        $variation3Option2->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('size_medium'));
        $variation3Option3->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('fabric_cotton'));

        $variation4Option1->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('color_red'));
        $variation4Option2->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('size_medium'));
        $variation4Option3->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('fabric_nylon'));

        $variation3DuplicateOption1->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('color_yellow'));
        $variation3DuplicateOption2->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('size_medium'));
        $variation3DuplicateOption3->expects($this->any())
            ->method('getUniqueIdentifier')
            ->will($this->returnValue('fabric_cotton'));

        $this->product->addVariation($variation2);
        $this->product->addVariation($variation3);

        // Confirm pre-existing references are affirmative
        $this->assertTrue($this->product->isVariationUnique($variation2));
        $this->assertTrue($this->product->isVariationUnique($variation3));

        // Confirm untracked and unique references are affirmative
        $this->assertTrue($this->product->isVariationUnique($variation4));

        $this->product->addVariation($variation4);
        $this->assertFalse($this->product->isVariationUnique($variation3Duplicate));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetMsrpWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setMsrp($decimal);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetPriceWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setPrice($decimal);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetHeightWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setHeight($decimal);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetLengthWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setLength($decimal);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetQuantityWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setQuantity($decimal);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetWeightWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setWeight($decimal);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetWidthWithDecimalThrowsInvalidArgumentException()
    {
        $decimal = 100.00;
        $this->product->setWidth($decimal);
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testRemoveUnknownAttributeThrowsOutOfBoundsException()
    {
        $element = $this->buildMock('AntiMattr\Common\Product\Attribute');
        $this->product->removeAttribute($element);
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testRemoveUnknownImageThrowsOutOfBoundsException()
    {
        $element = $this->buildMock('AntiMattr\Common\Product\Image');
        $this->product->removeImage($element);
    }

    /**
     * @expectedException OutOfBoundsException
     */
    public function testRemoveUnknownVariationThrowsOutOfBoundsException()
    {
        $element = $this->buildMock('AntiMattr\Common\Product\Variation');
        $this->product->removeVariation($element);
    }
}
