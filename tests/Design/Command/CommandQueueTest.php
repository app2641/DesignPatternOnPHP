<?php


use Design\Command\Queue;
use Design\Command\TouchCommand;
use Design\Command\CopyCommand;
use Design\Command\CompassCommand;
use Design\Command\File;

class CommandQueueTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Queue
     */
    private $queue;


    /**
     * @return void
     */
    public function setUp ()
    {
        $this->queue = new Queue();
    }


    /**
     * @test
     * @group command-run
     * @group command
     */
    public function 正常な処理 ()
    {
        $file = new File();
        $path = 'sample.txt';
        $file->setPath($path);

        $touch = new TouchCommand();
        $touch->setFile($file);

        $compass = new CompassCommand();
        $compass->setFile($file);

        $copy = new CopyCommand();
        $copy->setFile($file);

        $this->queue->addCommand($touch);
        $this->queue->addCommand($compass);
        $this->queue->addCommand($copy);
        $this->queue->run();

        $result = $path.'を作成しました'.
            $path.'を圧縮しました'.
            'copy_of_'.$path.'を作成しました';

        $this->expectOutputString($result);
    }
}

