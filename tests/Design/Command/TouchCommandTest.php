<?php


use Design\Command\TouchCommand;
use Design\Command\File;

class TouchCommandTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var TouchCommand
     */
    private $command;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->command = new TouchCommand();
    }


    /**
     * @test
     * @expectedException                   Exception
     * @expectedExceptionMessage            ファイルを指定してください
     * @group command-not-set-file
     * @group command
     */
    public function ファイルを指定してない場合 ()
    {
        $this->command->execute();
    }


    /**
     * @test
     * @group command-execute-create
     * @group command
     */
    public function 正常な処理 ()
    {
        $file = new File();
        $path = 'sample.txt';
        $file->setPath($path);

        $this->command->setFile($file);
        $this->command->execute();

        $this->expectOutputString($path.'を作成しました');
    }
}

