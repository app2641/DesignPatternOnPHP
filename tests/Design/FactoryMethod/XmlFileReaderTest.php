<?php


namespace Design\FactoryMethod;

use Design\FactoryMethod\XmlFileReader;

class XmlFileReaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var XmlFileReader
     **/
    private $reader;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->reader = new XmlFileReader();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルを指定してください
     * @group factory-not-set-file
     * @group factory
     */
    public function ファイルを指定していない場合 ()
    {
        $this->reader->read();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    指定ファイルを読み込むことが出来ません
     * @group factory-not-read-file
     * @group factory
     */
    public function 指定ファイルが読み込めない場合 ()
    {
        $this->reader->setFilePath('/hoo/bar.txt');
        $this->reader->read();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルの読み込みがされていません
     * @group factory-not-read
     * @group factory
     */
    public function ファイルを読み込んでいない場合 ()
    {
        $this->reader->setFilePath(ROOT.'/data/FactoryMethod/SampleData.xml');
        $this->reader->display();
    }


    /**
     * @test
     * @group factory-execute
     * @group factory
     */
    public function 正常な処理 ()
    {
        $this->reader->setFilePath(ROOT.'/data/FactoryMethod/SampleData.xml');
        $this->reader->read();
        $this->reader->display();

        $result = file_get_contents(ROOT.'/data/FactoryMethod/Result.html');
        $this->expectOutputString($result);
    }
}
