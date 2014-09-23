<?php


use Design\Facade\Order;

class OrderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Order
     */
    private $order;


    /**
     * @var OrderItem_Mock
     */
    private $order_item;


    /**
     * @var Item_Mock
     */
    private $item;


    /**
     * @return void
     */
    public function setUp ()
    {
        $id = 123;
        $this->order = new Order();

        $this->item = $this->getMock('Design\Facade\Item', array('getId'));
        $this->item->expects($this->any())
            ->method('getId')
            ->will($this->returnValue($id));

        $this->order_item = $this->getMock('Design\Facade\OrderItem', array('getItem'));
        $this->order_item->expects($this->any())
            ->method('getItem')
            ->will($this->returnValue($this->item));
    }


    /**
     * @test
     * @group facade-order-set-item
     * @group facade
     */
    public function オーダーに商品を追加する ()
    {
        $this->order->addItem($this->order_item);

        $items = $this->order->getItems();
        $this->assertArrayHasKey($this->item->getId(), $items);
        $this->assertEquals($this->order_item, $items[$this->item->getId()]);
    }
}

