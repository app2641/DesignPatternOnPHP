<?php


use Design\ChainOfResponsibility\AlphabetValidationHandler;
use Design\ChainOfResponsibility\NumberValidationHandler;

class CorAlphabetValidationHandlerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var AlphabetValidationHandler
     **/
    private $handler;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->handler = new AlphabetValidationHandler();
    }


    /**
     * @test
     * @group cor-set-next-handler
     * @group cor
     **/
    public function 次のハンドラを指定した場合 ()
    {
        $next_handler = new NumberValidationHandler();
        $this->handler->setHandler($next_handler);

        $this->assertInstanceOf(
            'Design\ChainOfResponsibility\NumberValidationHandler',
            $this->handler->getNextHandler()
        );
    }


    /**
     * @test
     * @group cor-alphabet-not-set-alphabet
     * @group cor
     */
    public function アルファベット文字列ではない場合 ()
    {
        $input = '1234abcd';
        $error = $this->handler->validate($input);

        $this->assertEquals('半角英字で入力してください', $error);
    }


    /**
     * @test
     * @group cor-slphabet-set-alphabet
     * @group cor
     **/
    public function アルファベットを指定した場合 ()
    {
        $input = 'abcd';
        $result = $this->handler->validate($input);

        $this->assertTrue($result, $input);
    }
}

