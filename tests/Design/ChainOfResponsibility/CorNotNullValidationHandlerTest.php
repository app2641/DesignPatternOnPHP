<?php


use Design\ChainOfResponsibility\NotNullValidationHandler;

class CorNotNullValidationHandlerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var NotNullValidationHandler
     **/
    private $handler;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->handler = new NotNullValidationHandler();
    }


    /**
     * @test
     * @group cor-notnull-set-null
     * @group cor
     */
    public function nullを指定した場合 ()
    {
        $input = null;
        $error = $this->handler->validate($input);

        $this->assertEquals('入力されていません', $error);
    }


    /**
     * @test
     * @group cor-notnull-set-notnull
     * @group cor
     */
    public function null以外を指定した場合 ()
    {
        $input = 'abcd1234';
        $result = $this->handler->validate($input);

        $this->assertTrue($result);
    }
}

