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
use Doctrine\Common\Collections\Collection;

/**
 * @author Matthew Fitzgerald <matthewfitz@gmail.com>
 */
interface AttributeInterface
{
    /**
     * Alphanumeric underscore
     *
     * @return string
     */
    public function getCanonicalName();

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string
     */
    public function setId($id);

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
    public function getName();

    /**
     * @param string
     */
    public function setName($name);

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
}
