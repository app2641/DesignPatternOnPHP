<?php


namespace Design\AbstractFactory;

class MockOrderDao implements OrderDao
{

    /**
     * @var DbItemDao
     **/
    private $item;


    /**
     * @param  ItemDao $item
     * @return void
     **/
    public function __construct (ItemDao $item)
    {
        $this->item = $item;
    }


    /**
     * @param  int $order_id
     * @return Order
     **/
    public function findById ($order_id)
    {
        
    }
}

