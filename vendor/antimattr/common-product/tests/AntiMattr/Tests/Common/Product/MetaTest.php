<?php

namespace AntiMattr\Tests\Common\Product;

use AntiMattr\Common\Product\Meta;
use AntiMattr\TestCase\AntiMattrTestCase;

class MetaTest extends AntiMattrTestCase
{
    private $meta;

    protected function setUp()
    {
        $this->meta = new Meta();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('ArrayAccess', $this->meta);
    }
}
