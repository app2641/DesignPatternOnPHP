<?php


use Design\Command\CopyCommand;
use Design\Command\File;

class CopyCommandTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var CopyCommand
     */
    private $command;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->command = new CopyCommand();
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
     * @group command-execute-copy
     * @group command
     */
    public function 正常な処理 ()
    {
        $file = new File();
        $path = 'sample.txt';
        $file->setPath($path);

        $this->command->setFile($file);
        $this->command->execute();

        $this->expectOutputString('copy_of_'.$path.'を作成しました');
    }
}

