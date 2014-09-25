<?php


namespace Design\AbstractFactory;

class Order
{

    /**
     * @var int
     **/
    private $id;


    /**
     * @var array
     **/
    private $items = array();


    /**
     * @param  int $order_id
     * @return void
     **/
    public function setId ($order_id)
    {
        $this->id = $order_id;
    }


    /**
     * @return int
     **/
    public function getId ()
    {
        if (is_null($this->id)) throw new \Exception('idが不正です');
        return $this->id;
    }


    /**
     * @param  Item $item
     * @return void
     **/
    public function addItem (Item $item)
    {
        $id = $item->getId();
        if (! array_key_exists($id, $this->items)) {
            $this->items[$id] = array(
                'object' => $item,
                'amount' => 0
            );
            $this->items[$id]['amount']++;
        }
    }


    /**
     * @return array
     **/
    public function getItems ()
    {
        return $this->items;
    }
}

