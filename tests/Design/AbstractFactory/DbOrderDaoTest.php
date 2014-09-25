<?php


use Design\AbstractFactory\DbOrderDao;
use Design\AbstractFactory\DbItemDao;

class DbOrderDaoTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var DbOrderDao
     **/
    private $dao;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->dao = new DbOrderDao(new DbItemDao());
    }


    /**
     * @test
     * @group af-order-find-by-id
     * @group af
     */
    public function 指定idのオーダーを取得する場合 ()
    {
        $order = $this->dao->findById(2);
        $this->assertInstanceOf('Design\AbstractFactory\Order', $order);

        $order = $this->dao->findById(2000);
        $this->assertNull($order);
    }
}

