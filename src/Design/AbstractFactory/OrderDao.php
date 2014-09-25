<?php


namespace Design\AbstractFactory;

interface OrderDao
{

    /**
     * @param  int $order_id
     * @return Order
     **/
    public function findById ($order_id);
}

