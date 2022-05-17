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
use InvalidArgumentException;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
class Image implements ImageInterface
{
    /** @var string */
    protected $id;

    /** @var ArrayAccess */
    protected $meta;

    /** @var int */
    protected $position;

    /** @var AntiMattr\Common\Product\ProductInterface */
    protected $product;

    /** @var string */
    protected $source;

    public function __construct()
    {
        $this->meta = new Meta();
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
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int
     *
     * @throws InvalidArgumentException
     */
    public function setPosition($position)
    {
        if (!is_int($position)) {
            throw new InvalidArgumentException('Image::position must be an integer');
        }

        $this->position = $position;
    }

    /**
     * @return AntiMattr\Common\Product\ProductInterface
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param AntiMattr\Common\Product\ProductInterface
     */
    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string
     */
    public function setSource($source)
    {
        $this->source = $source;
    }
}
