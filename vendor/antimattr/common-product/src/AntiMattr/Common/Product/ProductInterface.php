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
use Doctrine\Common\Collections\Collection;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
interface ProductInterface
{
    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     */
    public function addAttribute(AttributeInterface $attribute);

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getAttributes();

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     *
     * @return bool
     */
    public function hasAttribute(AttributeInterface $attribute);

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeAttribute(AttributeInterface $attribute);

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setAttributes(Collection $attributes);

    /**
     * @return DateTime
     */
    public function getCreatedAt();

    /**
     * @param DateTime
     */
    public function setCreatedAt(DateTime $createdAt);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDimensionUnit();
    /**
     * @param string
     */
    public function setDimensionUnit($dimensionUnit);

    /**
     * @return string
     */
    public function getEan();

    /**
     * @param string
     */
    public function setEan($ean);

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @param int
     */
    public function setHeight($height);

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string
     */
    public function setId($id);

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     */
    public function addImage(ImageInterface $image);

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getImages();

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     *
     * @return bool
     */
    public function hasImage(ImageInterface $image);

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeImage(ImageInterface $image);

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setImages(Collection $images);

    /**
     * @return int
     */
    public function getLength();

    /**
     * @param int
     */
    public function setLength($length);

    /**
     * @return ArrayAccess
     */
    public function getMeta();

    /**
     * @param ArrayAccess
     */
    public function setMeta(ArrayAccess $meta);

    /**
     * @return string
     */
    public function getMpn();

    /**
     * @param string
     */
    public function setMpn($mpn);

    /**
     * @return int
     */
    public function getMsrp();

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setMsrp($msrp);

    /**
     * @return int
     */
    public function getPrice();

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setPrice($price);

    /**
     * @return DateTime
     */
    public function getPublishedAt();

    /**
     * @param DateTime
     */
    public function setPublishedAt(DateTime $publishedAt);

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @param int
     */
    public function setQuantity($quantity);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string
     */
    public function setSku($sku);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getUpc();

    /**
     * @param string
     */
    public function setUpc($upc);

    /**
     * @return DateTime
     */
    public function getUpdatedAt();

    /**
     * @param DateTime
     */
    public function setUpdatedAt(DateTime $updatedAt);

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     */
    public function addVariation(VariationInterface $variant);

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getVariations();

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     *
     * @return bool
     */
    public function hasVariation(VariationInterface $variation);

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeVariation(VariationInterface $variation);

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setVariations(Collection $variants);

    /**
     * @return int
     */
    public function getWeight();

    /**
     * @param int
     */
    public function setWeight($weight);

    /**
     * @return string
     */
    public function getWeightUnit();

    /**
     * @param string
     */
    public function setWeightUnit($weightUnit);

     /**
     * @return int
     */
    public function getWidth();

    /**
     * @param int
     */
    public function setWidth($width);
}
