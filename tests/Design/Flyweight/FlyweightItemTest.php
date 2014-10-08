<?php


use Design\Flyweight\Item;

class FlyweightItemTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group flyweight-item-getter
     * @group flyweight
     */
    public function ゲッターの処理 ()
    {
        $code  = 'a1234';
        $name  = 'apple';
        $price = 100;

        $item = new Item($code, $name, $price);

        $this->assertEquals($code, $item->getCode());
        $this->assertEquals($name, $item->getName());
        $this->assertEquals($price, $item->getPrice());
    }
}

