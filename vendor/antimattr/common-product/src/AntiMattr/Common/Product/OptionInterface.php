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

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
interface OptionInterface
{
    /**
     * @return AntiMattr\Common\Product\AttributeInterface
     */
    public function getAttribute();

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     */
    public function setAttribute(AttributeInterface $attribute);

    /**
     * Alphanumeric underscore
     *
     * @return string
     */
    public function getCanonicalValue();

    /**
     * @return ArrayAccess
     */
    public function getMeta();

    /**
     * @param ArrayAccess
     */
    public function setMeta(ArrayAccess $meta);

    /**
     * Alphanumeric underscore
     *
     * @return string
     */
    public function getUniqueIdentifier();

    /**
     * @return string
     */
    public function getValue();

    /**
     * @param string
     */
    public function setValue($value);

    /**
     * @return AntiMattr\Common\Product\VariationInterface
     */
    public function getVariation();

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     */
    public function setVariation(VariationInterface $variation);
}
