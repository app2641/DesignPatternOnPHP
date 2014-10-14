<?php


use Design\Interpreter\CommandCommand;

class InterpreterCommandTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var CommandCommand
     **/
    private $command;


    /**
     * @var Context
     **/
    private $context;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->command = new CommandCommand();

        $this->context = $this->getMock('Design\Interpreter\Context', array(
            'getCurrentCommand', 'next'
        ));
    }


    /**
     * @test
     * @group inter-diskspace
     * @group inter
     */
    public function コマンドがdiskspaceの場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue('diskspace'));

        $this->command->execute($this->context);

        $this->expectOutputRegex('/Disk Free :.*/');
    }


    /**
     * @test
     * @group inter-date
     * @group inter
     */
    public function コマンドがdateの場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue('date'));

        $this->command->execute($this->context);

        $this->expectOutputRegex('/'.date('Y-m-d').'.*/');
    }


    /**
     * @test
     * @group inter-line
     * @group inter
     */
    public function コマンドがlineの場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue('line'));

        $this->command->execute($this->context);

        $this->expectOutputString('----------');
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    コマンドが正しくありません
     * @group inter-invalid-command
     * @group inter
     */
    public function コマンドが正しくない場合 ()
    {
        $this->context->expects($this->any())
            ->method('getCurrentCommand')->will($this->returnValue('foo'));

        $this->command->execute($this->context);
    }
}

