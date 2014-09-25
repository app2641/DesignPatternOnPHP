<?php


use Design\AbstractFactory\Item;

class AfItemTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Item
     **/
    private $item;


    /**
     * @return void
     **/
    public function __construct ()
    {
        $this->item = new Item();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    idが不正です
     * @group af-not-set-item-id
     * @group af
     */
    public function Idを指定していない場合 ()
    {
        $this->item->getId();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    商品名が不正です
     * @group af-not-set-item-name
     * @group af
     **/
    public function nameを指定していない場合 ()
    {
        $this->item->getName();
    }

}

