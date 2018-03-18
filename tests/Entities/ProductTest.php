<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testGetAndSetId()
    {
        $product = new \Importer\Entities\Product();

        $product->setId(1);

        $this->assertEquals(1, $product->getId());
    }
}