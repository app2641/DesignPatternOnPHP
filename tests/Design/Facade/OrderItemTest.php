<?php


use Design\Facade\OrderItem;

class OrderItemTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var OrderItem
     */
    private $order;


    /**
     * @var Item_Mock
     */
    private $item;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->order = new OrderItem();

        $this->item = $this->getMock('Design\Facade\Item');
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    Itemが不正です
     * @group facade-valid-order-item
     * @group facade
     */
    public function Itemが正しく指定されていない場合 ()
    {
        $this->order->getItem();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    個数が不正です
     * @group facade-valid-order-amount
     * @group facade
     */
    public function 個数が正しく指定されていない場合 ()
    {
        $this->order->getAmount();
    }


    /**
     * @test
     * @group facade-order-setter
     * @group facade
     */
    public function セッターのテスト ()
    {
        $this->order->setItem($this->item);
        $this->assertInstanceOf('Design\Facade\Item', $this->order->getItem());

        $amount = 12;
        $this->order->setAmount($amount);
        $this->assertEquals($amount, $this->order->getAmount());
    }
}

