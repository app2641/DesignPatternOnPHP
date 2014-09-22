<?php


use Design\FactoryMethod\ReaderFactory;

class ReaderFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ReaderFactory
     **/
    private $factory;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->factory = new ReaderFactory();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    サポートされていないファイルです
     * @group factory-not-supported
     * @group factory
     **/
    public function サポートされていないファイルを指定した場合 ()
    {
        $file_path = ROOT.'/data/FactoryMethod/Result.html';
        $reader = $this->factory->getReader($file_path);
    }


    /**
     * @test
     * @group factory-get-csv
     * @group factory
     */
    public function CsvReaderを取得する場合 ()
    {
        $file_path = ROOT.'/data/FactoryMethod/SampleData.csv';
        $reader = $this->factory->getReader($file_path);

        $this->assertInstanceOf('Design\FactoryMethod\CsvFileReader', $reader);
    }


    /**
     * @test
     * @group factory-get-xml
     * @group factory
     */
    public function XmlReaderを取得する場合 ()
    {
        $file_path = ROOT.'/data/FactoryMethod/SampleData.xml';
        $reader = $this->factory->getReader($file_path);

        $this->assertInstanceOf('Design\FactoryMethod\XmlFileReader', $reader);
    }
}

