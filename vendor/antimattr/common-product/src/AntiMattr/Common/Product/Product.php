<?php

/*
 * This file is part of the AntiMattr Common Product Model, a library by Matthew Fitzgerald.
 *
 * (c) 2014 Matthew Fitzgerald
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AntiMattr\Common\Product;

use ArrayAccess;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use InvalidArgumentException;
use OutOfBoundsException;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
class Product implements ProductInterface
{
    /** @var Doctrine\Common\Collections\Collection */
    protected $attributes;

    /** @var DateTime */
    protected $createdAt;

    /** @var string */
    protected $currency;

    /** @var string */
    protected $description;

    /** @var string */
    protected $dimensionUnit;

    /** @var string */
    protected $ean;

    /** @var int */
    protected $height;

    /** @var string */
    protected $id;

    /** @var Doctrine\Common\Collections\Collection */
    protected $images;

    /** @var int */
    protected $length;

    /** @var ArrayAccess */
    protected $meta;

    /** @var string */
    protected $mpn;

    /** @var int */
    protected $msrp;

    /** @var int */
    protected $price;

    /** @var DateTime */
    protected $publishedAt;

    /** @var int */
    protected $quantity;

    /** @var string */
    protected $sku;

    /** @var string */
    protected $status;

    /** @var string */
    protected $title;

    /** @var string */
    protected $upc;

    /** @var DateTime */
    protected $updatedAt;

    /** @var Doctrine\Common\Collections\Collection */
    protected $variations;

    /** @var int */
    protected $weight;

    /** @var string */
    protected $weightUnit;

    /** @var int */
    protected $width;

    public function __construct()
    {
        $this->attributes = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->meta = new Meta();
        $this->variations = new ArrayCollection();
    }

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     */
    public function addAttribute(AttributeInterface $attribute)
    {
        $this->attributes->add($attribute);
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     *
     * @return bool
     */
    public function hasAttribute(AttributeInterface $attribute)
    {
        return $this->attributes->contains($attribute);
    }

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeAttribute(AttributeInterface $attribute)
    {
        $success = $this->attributes->removeElement($attribute);

        if (!$success) {
            throw new OutOfBoundsException('Product::attributes do not contain attribute to remove');
        }
    }

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setAttributes(Collection $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDimensionUnit()
    {
        return $this->dimensionUnit;
    }

    /**
     * @param string
     */
    public function setDimensionUnit($dimensionUnit)
    {
        $this->dimensionUnit = $dimensionUnit;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setHeight($height)
    {
        if (!is_int($height)) {
            throw new InvalidArgumentException('Product::height must be an integer');
        }

        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     */
    public function addImage(ImageInterface $image)
    {
        $this->images->add($image);
        if ($this !== $image->getProduct()) {
            $image->setProduct($this);
        }
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     *
     * @return bool
     */
    public function hasImage(ImageInterface $image)
    {
        return $this->images->contains($image);
    }

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeImage(ImageInterface $image)
    {
        $success = $this->images->removeElement($image);

        if (!$success) {
            throw new OutOfBoundsException('Product::images do not contain image to remove');
        }
    }

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setImages(Collection $images)
    {
        $this->images = $images;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setLength($length)
    {
        if (!is_int($length)) {
            throw new InvalidArgumentException('Product::length must be an integer');
        }

        $this->length = $length;
    }

    /**
     * @return ArrayAccess
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param ArrayAccess
     */
    public function setMeta(ArrayAccess $meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return string
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * @param string
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;
    }

    /**
     * @return int
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setMsrp($msrp)
    {
        if (!is_int($msrp)) {
            throw new InvalidArgumentException('Product::msrp must be an integer');
        }

        $this->msrp = $msrp;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setPrice($price)
    {
        if (!is_int($price)) {
            throw new InvalidArgumentException('Product::price must be an integer');
        }

        $this->price = $price;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTime
     */
    public function setPublishedAt(DateTime $publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

     /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setQuantity($quantity)
    {
        if (!is_int($quantity)) {
            throw new InvalidArgumentException('Product::quantity must be an integer');
        }

        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * @param string
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     *
     * @throws OutOfBoundsException
     */
    public function addVariation(VariationInterface $variation)
    {
        if (false === $this->isVariationUnique($variation)) {
            $message = sprintf(
                "Product::variations already contain a Variation with a unique identifier %s",
                $variation->getUniqueIdentifier()
            );
            throw new OutOfBoundsException($message);
        }

        $this->variations->add($variation);
        if ($this !== $variation->getProduct()) {
            $variation->setProduct($this);
        }
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     *
     * @return bool
     */
    public function hasVariation(VariationInterface $variation)
    {
        return $this->variations->contains($variation);
    }

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     *
     * @return bool
     */
    public function isVariationUnique(VariationInterface $variation)
    {
        if ($this->variations->isEmpty()) {
            return true;
        }

        return $this->variations->forAll(function ($key, $element) use ($variation) {
            if ($variation->getUniqueIdentifier() === $element->getUniqueIdentifier() && $variation !== $element) {
                return false;
            }

            return true;
        });
    }

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeVariation(VariationInterface $variation)
    {
        $success = $this->variations->removeElement($variation);

        if (!$success) {
            throw new OutOfBoundsException('Product::variations do not contain variation to remove');
        }
    }

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setVariations(Collection $variations)
    {
        $this->variations = $variations;
    }

     /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setWeight($weight)
    {
        if (!is_int($weight)) {
            throw new InvalidArgumentException('Product::weight must be an integer');
        }

        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getWeightUnit()
    {
        return $this->weightUnit;
    }

    /**
     * @param string
     */
    public function setWeightUnit($weightUnit)
    {
        $this->weightUnit = $weightUnit;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setWidth($width)
    {
        if (!is_int($width)) {
            throw new InvalidArgumentException('Product::width must be an integer');
        }

        $this->width = $width;
    }
}
