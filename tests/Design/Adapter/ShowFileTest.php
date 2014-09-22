<?php


use Design\Adapter\ShowFile;

class ShowFileTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ShowFile
     **/
    private $sf;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->sf = new ShowFile();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイル情報を指定してください
     * @group adapter-not-set-file
     * @group adapter
     */
    public function ファイル情報を指定していない場合 ()
    {
        $this->sf->showPlain();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    指定ファイルを読み込むことが出来ません
     * @group adapter-not-read-file
     * @group adapter
     */
    public function 存在しないファイルを指定した場合 ()
    {
        $this->sf->setFilePath('/hoge/foo.txt');
        $this->sf->showPlain();
    }


    /**
     * @test
     * @group adapter-show-plain
     * @group adapter
     **/
    public function 指定ファイルの内容をプレーンテキストで表示する ()
    {
        $this->sf->setFilePath(ROOT.'/data/Adapter/SampleData.txt');
        $this->sf->showPlain();

        $result = file_get_contents(ROOT.'/data/Adapter/PlainResult.html');
        $this->expectOutputString($result);
    }


    /**
     * @test
     * @group adapter-highlight
     * @group adapter
     **/
    public function 指定ファイルの内容をハイライト表示する ()
    {
        $this->sf->setFilePath(ROOT.'/data/Adapter/SampleData.txt');
        $this->sf->showHighlight();

        $result = file_get_contents(ROOT.'/data/Adapter/HighLightResult.html');
        $this->expectOutputString($result);
    }
}

