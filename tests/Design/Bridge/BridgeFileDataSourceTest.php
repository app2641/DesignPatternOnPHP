<?php


use Design\Bridge\FileDataSource;

class BridgeFileDataSourceTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var FileDataSource
     **/
    private $source;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->source = new FileDataSource();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルを指定してください
     * @group bridge-not-set-file
     * @group bridge
     */
    public function ファイルを指定していない場合 ()
    {
        $this->source->open();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルが読み込めません
     * @group bridge-not-read-file
     * @group bridge
     */
    public function ファイルが読み込めない場合 ()
    {
        $this->source->setFilePath(ROOT.'/data/Bridge/foo.txt');
        $this->source->open();
    }
}

