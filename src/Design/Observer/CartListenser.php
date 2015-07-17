<?php


namespace Design\Observer;

interface CartListener
{

    /**
     * @param  Cart $cart
     * @return void
     **/
    public function update (Cart $cart);
}

