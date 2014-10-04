<?php


use Design\Command\CompassCommand;
use Design\Command\File;

class CompassCommandTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var CompassCommand
     */
    private $command;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->command = new CompassCommand();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ファイルを指定してください
     * @group command-not-set-file
     * @group command
     */
    public function ファイルを指定してない場合 ()
    {
        $this->command->execute();
    }


    /**
     * @test
     * @group command-execute-compass
     * @group command
     */
    public function 正常な処理 ()
    {
        $file = new File();
        $path = 'sample.txt';

        $file->setPath($path);
        $this->command->setFile($file);
        $this->command->execute();

        $this->expectOutputString($path.'を圧縮しました');
    }
}

