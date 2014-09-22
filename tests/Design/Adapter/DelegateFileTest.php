<?php


use Design\Adapter\DelegateFile;

class DelegateFileTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DelegateFile
     **/
    private $df;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->df = new DelegateFile();
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
        $this->df->display();
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
        $this->df->setFilePath('/hoge/foo.txt');
        $this->df->display();
    }


    /**
     * @test
     * @group adapter-highlight
     * @group adapter
     **/
    public function 指定ファイルの内容をハイライト表示する ()
    {
        $this->df->setFilePath(ROOT.'/data/Adapter/SampleData.txt');
        $this->df->display();

        $result = file_get_contents(ROOT.'/data/Adapter/HighLightResult.html');
        $this->expectOutputString($result);
    }
}

