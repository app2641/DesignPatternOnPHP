<?php


use Design\Interpreter\JobCommand;

class InterpreterJobTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var JobCommand
     **/
    private $command;


    /**
     * @var Context_Mock
     **/
    private $context;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->command = new JobCommand();

        $this->context = $this->getMock('Design\Interpreter\Context', array(
            'getCurrentCommand', 'next'
        ));
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    構文が正しくありません
     * @group inter-wrong-syntax
     * @group inter
     **/
    public function 開始構文がbeginでない場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrent')->will($this->returnValue('Σ(ﾟдﾟlll)ｶﾞｰﾝ'));

        $this->command->execute($this->context);
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    次のコマンドが指定されていません
     * @group inter-not-set-next-command
     * @group inter
     */
    public function 次のコマンドを指定していない場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue('begin'));

        $this->command->execute($this->context);
    }


    /**
     * @test
     * @group inter-job-execute
     * @group inter
     */
    public function 正常な処理 ()
    {
        $this->context->expects($this->any())
            ->method('next')
            ->will($this->returnValue($this->getMock('Design\Interpreter\Context')));

        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue('begin'));

        $next_command = $this->getMock('Design\Interpreter\CommandListCommand', array(
            'execute'
        ));
        $this->command->setNextCommand($next_command);

        $result = $this->command->execute($this->context);
        $this->assertTrue($result);
    }
}

