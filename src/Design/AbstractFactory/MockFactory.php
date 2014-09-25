<?php


namespace Design\AbstractFactory;

use Design\AbstractFactory\MockItemDao;
use Design\AbstractFactory\MockOrderDao;

class MockFactory implements DaoFactory
{

    /**
     * @return MockItemDao
     **/
    public function createItemDao ()
    {
        return new MockItemDao();
    }


    /**
     * @return MockOrderDao
     **/
    public function createOrderDao ()
    {
        return new MockOrderDao($this->createItemDao());
    }
}

