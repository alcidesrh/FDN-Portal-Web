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

use Doctrine\Common\Collections\Collection;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
interface VariationInterface
{
    /**
     * @return AntiMattr\Common\Product\ImageInterface
     */
    public function getImage();

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     */
    public function setImage(ImageInterface $image);

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     */
    public function addOption(OptionInterface $option);

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getOptions();

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     *
     * @return bool
     */
    public function hasOption(OptionInterface $option);

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeOption(OptionInterface $option);

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setOptions(Collection $options);

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setPosition($position);

    /**
     * @return AntiMattr\Common\Product\ProductInterface
     */
    public function getProduct();

    /**
     * @param AntiMattr\Common\Product\ProductInterface
     */
    public function setProduct(ProductInterface $product);

    /**
     * A Variation is uniquely identified by the combination of options
     *
     * @return string
     */
    public function getUniqueIdentifier();
}
