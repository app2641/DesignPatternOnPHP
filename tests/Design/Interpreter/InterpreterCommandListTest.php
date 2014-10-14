<?php


use Design\Interpreter\CommandListCommand;

class InterpreterCommandListTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var CommandListCommand
     **/
    private $command;


    /**
     * @var Context
     **/
    private $context;


    /**
     * @var CommandCommand_Mock
     **/
    private $next_command;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->command = new CommandListCommand();

        $this->context = $this->getMock('Design\Interpreter\Context', array(
            'getCurrentCommand', 'next'
        ));

        $this->next_command = $this->getMock('Design\Interpreter\CommandCommand', array(
            'execute'
        ));
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    次のコマンドが指定されていません
     * @group inter-null-current
     * @group inter
     */
    public function 次のコマンドがnullの場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue(null));

        $this->command->execute($this->context);
    }


    /**
     * @test
     * @group inter-end
     * @group inter
     **/
    public function 処理の終了 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')
            ->will($this->returnValue('end'));

        $result = $this->command->execute($this->context);
        $this->assertTrue($result);
    }
}

