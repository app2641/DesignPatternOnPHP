<?php


use Design\Interpreter\Context;

class InterpreterContextTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Context
     **/
    private $context;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->context = new Context();
    }


    /**
     * @test
     * @group inter-get-current
     * @group inter
     */
    public function コマンド指定をしていない場合 ()
    {
        $result = $this->context->getCurrentCommand();
        $this->assertNull($result);
    }
}

