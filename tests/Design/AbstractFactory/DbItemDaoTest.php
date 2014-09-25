<?php


use Design\AbstractFactory\DbItemDao;

class DbItemDaoTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var DbItemDao
     **/
    private $dao;


    /**
     * @var void
     **/
    public function __construct ()
    {
        $this->dao = new DbItemDao();
    }


    /**
     * @test 
     * @group af-item-find-by-id
     * @group af
     **/
    public function 指定IDをアイテムを取得する場合 ()
    {
        $item = $this->dao->findById(1);
        $this->assertEquals(1, $item->getId());
        $this->assertEquals('限定Tシャツ', $item->getName());

        $item = $this->dao->findById(2000);
        $this->assertNull($item);
    }
}

