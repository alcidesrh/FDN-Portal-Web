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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use OutOfBoundsException;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
class Attribute implements AttributeInterface
{
    /** @var string */
    protected $id;

    /** @var ArrayAccess */
    protected $meta;

    /** @var string */
    protected $name;

    /** @var Doctrine\Common\Collections\Collection */
    protected $options;

    public function __construct()
    {
        $this->meta = new Meta();
        $this->options = new ArrayCollection();
    }

    /**
     * Alphanumeric underscore
     *
     * @return string
     */
    public function getCanonicalName()
    {
        $value = (string) $this->name;
        $value = strtolower($value);
        // Keep Alphanumeric, dashes and underscores
        $value = preg_replace("/[^a-z0-9_\s-]/", "", $value);
        // Remove repeating whitespace or underscores
        $value = preg_replace("/[\s_]+/", " ", $value);
        // Convert whitespaces and dash to underscore
        return preg_replace("/[\s-]/", "_", $value);
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param AntiMattr\Common\Product\OptionInterface
     */
    public function addOption(OptionInterface $option)
    {
        $this->options->add($option);
        if ($this !== $option->getAttribute()) {
            $option->setAttribute($this);
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
            throw new OutOfBoundsException('Attribute::options do not contain option to remove');
        }
    }

    /**
     * @param Doctrine\Common\Collections\Collection
     */
    public function setOptions(Collection $options)
    {
        $this->options = $options;
    }
}
