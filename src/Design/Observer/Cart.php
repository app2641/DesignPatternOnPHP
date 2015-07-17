<?php


namespace Design\Observer;

class Cart
{

    /**
     * @var array
     **/
    private $items = array();


    /**
     * @var array
     **/
    private $listeners = array();


    /**
     * @param  string $item
     * @return boolean
     **/
    public function hasItem ($item)
    {
        return array_key_exists($item, $this->items);
    }


    /**
     * @param  string $item
     * @return void
     **/
    public function addItem ($item)
    {
        $this->items[$item] = (isset($this->items[$item]) ? ++$this->items[$item] : 1);
        $this->notify();
    }


    /**
     * @param  string $item
     * @return void
     **/
    public function removeItem ($item)
    {
        $this->items[$item] = (isset($this->items[$item]) ? --$this->items[$item] : 0);
        if ($this->items[$item] <= 0) {
            unset($this->items[$item]);
        }
        $this->notify();
    }


    /**
     * @return array
     **/
    public function getItems ()
    {
        return $this->items;
    }


    /**
     * @param  CartListener $listener
     * @return void
     **/
    public function addListener (CartListener $listener)
    {
        $this->listeners[get_class($listener)] = $listener;
    }


    /**
     * @return array
     **/
    public function getListeners ()
    {
        return $this->listeners;
    }


    /**
     * @param  CartListener $listener
     * @return void
     **/
    public function removeListener (CartListener $listener)
    {
        unset($this->listeners[get_class($listener)]);
    }


    /**
     * Observerクラスへ通知するメソッド
     *
     * @return void
     **/
    public function notify ()
    {
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }
}

