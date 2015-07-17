<?php


use Design\Observer\Cart;

class ObserverCartTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Cart
     **/
    private $cart;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->cart = new Cart();
    }


    /**
     * @test
     * @group observer-add-item
     * @group observer
     **/
    public function アイテムの追加 ()
    {
        $item = 'ぬいぐるみ';
        $this->cart->addItem($item);

        $items = $this->cart->getItems();
        $this->assertTrue(isset($items[$item]));
        $this->assertEquals(1, $items[$item]);
    }


    /**
     * @test
     * @group observer-has-item
     * @group observer
     **/
    public function アイテムの確認 ()
    {
        $item = 'ぬいぐるみ';
        $this->assertFalse($this->cart->hasItem($item));

        $this->cart->addItem($item);
        $this->assertTrue($this->cart->hasItem($item));
    }


    /**
     * @test
     * @group observer-remove-item
     * @group observer
     **/
    public function アイテムの破棄 ()
    {
        // ふたつ追加
        $item = 'ぬいぐるみ';
        $this->cart->addItem($item);
        $this->cart->addItem($item);

        // ひとつ削除
        $this->cart->removeItem($item);
        $items = $this->cart->getItems();
        $this->assertEquals(1, $items[$item]);

        // すべて削除
        $this->cart->removeItem($item);
        $items = $this->cart->getItems();
        $this->assertFalse(isset($items[$item]));
    }


    /**
     * @test
     * @group observer-add-listener
     * @group observer
     **/
    public function リスナーの追加 ()
    {
        $listener = $this->getMock('Design\Observer\CartListener');
        $this->cart->addListener($listener);

        $listeners = $this->cart->getListeners();
        $this->assertEquals($listener, current($listeners));
    }


    /**
     * @test
     * @group observer-remove-listener
     * @group observer
     **/
    public function リスナーの破棄 ()
    {
        $listener = $this->getMock('Design\Observer\CartListener');
        $this->cart->addListener($listener);

        $listeners = $this->cart->getListeners();
        $this->assertEquals(1, count($listeners));

        $this->cart->removeListener($listener);
        $listeners = $this->cart->getListeners();
        $this->assertEquals(0, count($listeners));
    }
}

