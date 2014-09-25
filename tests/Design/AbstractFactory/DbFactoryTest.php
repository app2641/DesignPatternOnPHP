<?php


use Design\AbstractFactory\DbFactory;

class DbFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var DbFactory
     **/
    private $factory;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->factory = new DbFactory();
    }


    /**
     * @test
     * @group af-get-item-dao
     * @group af
     */
    public function アイテムモデルのクラスを取得する ()
    {
        $dao = $this->factory->createItemDao();
        $this->assertInstanceOf('Design\AbstractFactory\DbItemDao', $dao);
    }


    /**
     * @test
     * @group af-get-order-dao
     * @group af
     **/
    public function オーダーモデルのクラスを取得する ()
    {
        $item = $this->getMock('Design\AbstractFactory\DbItemDao');

        $dao = $this->factory->createOrderDao($item);
        $this->assertInstanceOf('Design\AbstractFactory\DbOrderDao', $dao);
    }
}

