<?php


use Design\AbstractFactory\MockFactory;

class MockFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var MockFactory
     **/
    private $factory;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->factory = new MockFactory();
    }


    /**
     * @test
     * @group af-get-mock-item-dao
     * @group af
     */
    public function ItemDaoのモックを取得する場合 ()
    {
        $dao = $this->factory->createItemDao();
        $this->assertInstanceOf('Design\AbstractFactory\MockItemDao', $dao);
    }


    /**
     * @test
     * @group af-get-mock-order-dao
     * @group af
     */
    public function OrderDaoのモックを取得する場合 ()
    {
        $item_dao = $this->getMock('Design\AbstractFactory\MockItemDao');

        $dao = $this->factory->createOrderDao($item_dao);
        $this->assertInstanceOf('Design\AbstractFactory\MockOrderDao', $dao);
    }
}

