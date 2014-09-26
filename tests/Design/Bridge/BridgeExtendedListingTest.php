<?php


use Design\Bridge\ExtendedListing;
use Design\Bridge\FileDataSource;

class BridgeExtendedListringTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ExtendedListing
     **/
    private $list;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->list = new ExtendedListing();
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


        $this->list->open();
        $output = $this->list->readWithEncode();
        $this->list->close();

        $result = htmlspecialchars($result, ENT_QUOTES);
        $this->assertEquals($result, $output);
    }
}
