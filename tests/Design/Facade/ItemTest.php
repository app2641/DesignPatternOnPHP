<?php


use Design\Facade\Item;

class ItemTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * @var Item
     */
    private $item;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->item = new Item();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    idが不正です
     * @group facade-valid-item-id
     * @group facade
     */
    public function idを正しく指定いない場合 ()
    {
        $this->item->getId();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    nameが不正です
     * @group facade-valid-item-name
     * @group facade
     */
    public function nameを正しく指定していない場合 ()
    {
        $this->item->getName();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    priceが不正です
     * @group facade-valid-item-price
     * @group facade
     */
    public function priceを正しく指定していない場合 ()
    {
        $this->item->getPrice();
    }


    /**
     * @test
     * @group facade-item-set-param
     * @group facade
     */
    public function セッターのテスト ()
    {
        $id = 153;
        $this->item->setId($id);
        $this->assertEquals($id, $this->item->getId());

        $name = 'hooooooo!!!!';
        $this->item->setName($name);
        $this->assertEquals($name, $this->item->getName());

        $price = 2000;
        $this->item->setPrice($price);
        $this->assertEquals($price, $this->item->getPrice());
    }
}

