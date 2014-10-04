<?php


use Design\Command\File;

class CommandFile extends PHPUnit_Framework_TestCase
{

    /**
     * @var File
     */
    private $file;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->file = new File();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルを指定してください
     * @group command-not-set-path
     * @group command
     */
    public function ファイルを指定していない場合 ()
    {
        $this->file->getPath();
    }


    /**
     * @test
     * @group command-set-path
     * @group command
     */
    public function ファイルを指定した場合 ()
    {
        $path = 'foo';
        $this->file->setPath($path);
        $this->assertEquals($path, $this->file->getPath());
    }


    /**
     * @test
     * @group command-decompass
     * @group command
     */
    public function ファイルの展開 ()
    {
        $path = 'sample.txt';
        $this->file->setPath($path);
        $this->file->decompass();

        $this->expectOutputString($path.'を展開しました');
    }


    /**
     * @test
     * @group command-compass
     * @group command
     */
    public function ファイルの圧縮 ()
    {
        $path = 'sample.txt';
        $this->file->setpath($path);
        $this->file->compass();

        $this->expectoutputstring($path.'を圧縮しました');
    }


    /**
     * @test
     * @group command-create
     * @group command
     */
    public function ファイルの作成 ()
    {
        $path = 'sample.txt';
        $this->file->setpath($path);
        $this->file->create();

        $this->expectoutputstring($path.'を作成しました');
    }
}

