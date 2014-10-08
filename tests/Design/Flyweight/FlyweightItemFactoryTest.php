<?php


use Design\Flyweight\ItemFactory;

class FlyweightItemFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルが読み込めません
     * @group flyweight-factory-not-readable-file
     * @group flyweight
     */
    public function 指定ファイルが読み込めない場合 ()
    {
        $path = ROOT.'/sample.csv';
        $factory = ItemFactory::getInstance($path);
    }


    /**
     * @test
     * @group flyweight-factory-get-instance
     * @group flyweight
     */
    public function ファクトリのインスタンス化 ()
    {
        $path = ROOT.'/data/Flyweight/sample.csv';
        $factory = ItemFactory::getInstance($path);

        $this->assertInstanceOf('Design\Flyweight\ItemFactory', $factory);
    }


    /**
     * @test
     * @group flyweight-factory-get-item
     * @group flyweight
     */
    public function ファクトリからアイテムを取得する ()
    {
        $path = ROOT.'/data/Flyweight/sample.csv';
        $factory = ItemFactory::getInstance($path);

        $item = $factory->getItem('ABC0001');
        $this->assertInstanceOf('Design\Flyweight\Item', $item);

        // 存在しないコードの場合
        $item = $factory->getItem('hogehoge');
        $this->assertNull($item);
    }


    /**
     * @test
     * @group flyweight-factory-same-item
     * @group flyweight
     */
    public function ファクトリを介して取得したアイテムが再利用されているかどうか ()
    {
        $path = ROOT.'/data/Flyweight/sample.csv';
        $factory = ItemFactory::getInstance($path);

        $item1 = $factory->getItem('ABC0001');
        $this->assertEquals($item1, $factory->getItem('ABC0001'));
    }
}

