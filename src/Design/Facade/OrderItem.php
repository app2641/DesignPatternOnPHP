<?php


namespace Design\Facade;

class OrderItem
{

    /**
     * @var Item
     */
    private $item;


    /**
     * @var int
     */
    private $amount;


    /**
     * @param  Item $item
     * @return void
     */
    public function setItem (Item $item)
    {
        $this->item = $item;
    }


    /**
     * @return Item
     */
    public function getItem ()
    {
        if (is_null($this->item)) throw new \Exception('Itemが不正です');
        return $this->item;
    }


    /**
     * @param  int $amount 
     * @return void
     */
    public function setAmount ($amount)
    {
        $this->amount = $amount;
    }


    /**
     * @return int
     */
    public function getAmount ()
    {
        if (is_null($this->amount)) throw new \Exception('個数が不正です');
        return $this->amount;
    }
}

