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
interface ImageInterface
{
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
     * @return string
     */
    public function getSource();

    /**
     * @param string
     */
    public function setSource($source);
}
