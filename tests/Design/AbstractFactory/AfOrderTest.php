<?php


use Design\AbstractFactory\Order;
use Design\AbstractFactory\Item;

class AfOrderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Order
     **/
    private $order;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->order = new Order();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    idが不正です
     * @group af-not-set-order-id
     * @group af
     **/
    public function idを指定していない場合 ()
    {
        $this->order->getId();
    }


    /**
     * @test
     * @group af-order-add-item
     * @group af
     **/
    public function オーダーにアイテムを追加する ()
    {
        $item = new Item();
        $item->setId(1);
        $item->setName('foo');

        $this->order->addItem($item);
        $this->assertTrue(is_array($this->order->getItems()));
    }
}

