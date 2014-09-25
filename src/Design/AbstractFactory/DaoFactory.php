<?php


namespace Design\AbstractFactory;

interface DaoFactory
{

    /**
     * @return void
     **/
    public function createItemDao ();


    /**
     * @return void
     **/
    public function createOrderDao ();
}

