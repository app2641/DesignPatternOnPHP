<?php


use Design\Facade\ItemDao;

class ItemDaoTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group facade-item-dao-fetchbyid
     * @group facade
     */
    public function 指定IDの商品を取得する ()
    {
        $id    = 1;
        $name  = 'パン';
        $price = 100;

        $dao  = ItemDao::getInstance();
        $item = $dao->fetchById($id);

        $this->assertEquals($id, $item->getId());
        $this->assertEquals($name, $item->getName());
        $this->assertEquals($price, $item->getPrice());
    }


    /**
     * @test
     * @group facade-item-dao-null
     * @group facade
     */
    public function 存在しないアイテムを取得しようとした場合 ()
    {
        $dao  = ItemDao::getInstance();
        $item = $dao->fetchById(10000);

        $this->assertNull($item);
    }
}

