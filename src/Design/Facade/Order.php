<?php


namespace Design\Facade;

class Order
{

    /**
     * @var array
     */
    private $items = array();


    /**
     * @param  OrderItem $order_item
     * @return void
     */
    public function addItem (OrderItem $order_item)
    {
        $item = $order_item->getItem();
        $this->items[$item->getId()] = $order_item;
    }


    /**
     * @return array
     */
    public function getItems ()
    {
        return $this->items;
    }
}

