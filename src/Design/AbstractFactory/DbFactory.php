<?php


namespace Design\AbstractFactory;

use Design\AbstractFactory\DbItemDao;

class DbFactory implements DaoFactory
{

    /**
     * @return void
     **/
    public function createItemDao ()
    {
        return new DbItemDao();
    }


    /**
     * @return void
     **/
    public function createOrderDao ()
    {
        return new DbOrderDao($this->createItemDao());
    }
}

