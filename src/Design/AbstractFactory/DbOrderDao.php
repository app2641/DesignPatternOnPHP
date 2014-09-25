<?php


namespace Design\AbstractFactory;

class DbOrderDao implements OrderDao
{

    /**
     * @var array
     **/
    private $orders;


    /**
     * @param  ItemDao $item_dao
     * @return void
     **/
    public function __construct (ItemDao $item_dao)
    {
        $fp = fopen(ROOT.'/data/AbstractFactory/order.csv', 'r');
        while ($data = fgetcsv($fp, 1000, ',')) {
            $order = new Order();
            $order->setId($data[0]);

            foreach (explode(',', $data[1]) as $item_id) {
                $item = $item_dao->findById($item_id);
                if (! is_null($item)) {
                    $order->addItem($item);
                }
            }

            $this->orders[$order->getId()] = $order;
        }
    }


    /**
     * @param  int $order_id
     * @return Order
     **/
    public function findById ($order_id)
    {
        if (array_key_exists($order_id, $this->orders)) {
            return $this->orders[$order_id];
        } else {
            return null;
        }
    }
}

