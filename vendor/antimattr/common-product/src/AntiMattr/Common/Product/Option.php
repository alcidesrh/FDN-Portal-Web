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
class Option implements OptionInterface
{
    /** @var AntiMattr\Common\Product\AttributeInterface */
    protected $attribute;

    /** @var ArrayAccess */
    protected $meta;

    /** @var string */
    protected $value;

    /** @var AntiMattr\Common\Product\VariationInterface */
    protected $variation;

    public function __construct()
    {
        $this->meta = new Meta();
    }

    /**
     * @return AntiMattr\Common\Product\AttributeInterface
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param AntiMattr\Common\Product\AttributeInterface
     */
    public function setAttribute(AttributeInterface $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Alphanumeric underscore
     *
     * @return string
     */
    public function getCanonicalValue()
    {
        $value = (string) $this->value;
        $value = strtolower($value);
        // Keep Alphanumeric, dashes and underscores
        $value = preg_replace("/[^a-z0-9_\s-]/", "", $value);
        // Remove repeating whitespace or underscores
        $value = preg_replace("/[\s_]+/", " ", $value);
        // Convert whitespaces and dash to underscore
        return preg_replace("/[\s-]/", "_", $value);
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
     * Alphanumeric underscore
     *
     * @return string
     */
    public function getUniqueIdentifier()
    {
        return sprintf(
            "%s_%s",
            $this->attribute->getCanonicalName(),
            $this->getCanonicalValue()
        );
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return AntiMattr\Common\Product\VariationInterface
     */
    public function getVariation()
    {
        return $this->variation;
    }

    /**
     * @param AntiMattr\Common\Product\VariationInterface
     */
    public function setVariation(VariationInterface $variation)
    {
        $this->variation = $variation;
    }
}
