<?php


use Design\Adapter\InheritanceFile;

class InheritanceFileTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var InheritanceFile
     **/
    private $if;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->if = new InheritanceFile();
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
        $this->if->display();
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
        $this->if->setFilePath('/hoge/foo.txt');
        $this->if->display();
    }


    /**
     * @test
     * @group adapter-highlight
     * @group adapter
     **/
    public function 指定ファイルの内容をハイライト表示する ()
    {
        $this->if->setFilePath(ROOT.'/data/Adapter/SampleData.txt');
        $this->if->display();

        $result = file_get_contents(ROOT.'/data/Adapter/HighLightResult.html');
        $this->expectOutputString($result);
    }
}

