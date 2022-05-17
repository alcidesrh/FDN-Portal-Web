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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use InvalidArgumentException;
use OutOfBoundsException;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
class Variation extends Product implements VariationInterface
{
    /** @var AntiMattr\Common\Product\ImageInterface */
    protected $image;

    /** @var Doctrine\Common\Collections\Collection */
    protected $options;

    /** @var int */
    protected $position;

    /** @var AntiMattr\Common\Product\ProductInterface */
    protected $product;

    public function __construct()
    {
        parent::__construct();
        $this->options = new ArrayCollection();
    }

    /**
     * @return AntiMattr\Common\Product\ImageInterface
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param AntiMattr\Common\Product\ImageInterface
     */
    public function setImage(ImageInterface $image)
    {
        $this->image = $image;
        if ($this->product && !$this->product->hasImage($image)) {
            $this->product->addImage($image);
        }
    }

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     */
    public function addOption(OptionInterface $option)
    {
        $this->options->add($option);
        if ($this !== $option->getVariation()) {
            $option->setVariation($this);
        }
    }

    /**
     * @return Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     *
     * @return bool
     */
    public function hasOption(OptionInterface $option)
    {
        return $this->options->contains($option);
    }

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     *
     * @throws OutOfBoundsException
     */
    public function removeOption(OptionInterface $option)
    {
        $success = $this->options->removeElement($option);

        if (!$success) {
            throw new OutOfBoundsException('Variation::options do not contain option to remove');
        }
    }

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setOptions(Collection $options)
    {
        $this->options = $options;
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
            throw new InvalidArgumentException('Variant::position must be an integer');
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
     * A Variation is uniquely identified by the combination of Variation::options
     *
     * @return string
     */
    public function getUniqueIdentifier()
    {
        if ($this->options->isEmpty()) {
            return;
        }

        $keys = array();
        foreach ($this->options as $option) {
            $keys[] = $option->getUniqueIdentifier();
        }
        sort($keys);

        return implode("_", $keys);
    }
}
