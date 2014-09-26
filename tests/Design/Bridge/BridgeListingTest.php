<?php


use Design\Bridge\Listing;
use Design\Bridge\FileDataSource;

class BridgeListringTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Listing
     **/
    private $list;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->list = new Listing();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ソースクラスが指定されていません
     * @group bridge-not-set-source
     * @group bridge
     **/
    public function ソースクラスを指定していない場合 ()
    {
        $this->list->open();
    }


    /**
     * @test
     * @group bridge-list-exeecute
     * @group bridge
     */
    public function 正常な処理 ()
    {
        $source = new FileDataSource();
        $source->setFilePath(ROOT.'/data/Bridge/data.html');

        $this->list->setDataSource($source);
        $this->list->open();
        $output = $this->list->read();
        $this->list->close();

        $result = file_get_contents(ROOT.'/data/Bridge/data.html');
        $this->assertEquals($result, $output);
    }
}

