<?php


use Design\ChainOfResponsibility\NumberValidationHandler;
use Design\ChainOfResponsibility\AlphabetValidationHandler;

class CorNumberValidationHandler extends PHPUnit_Framework_TestCase
{

    /**
     * @var NumberValidationHandler
     **/
    private $handler;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->handler = new NumberValidationHandler();
    }


    /**
     * @test
     * @group cor-number-get-next-handler
     * @group cor
     */
    public function 次のハンドラを取得する ()
    {
        $next_handler = new AlphabetValidationHandler();
        $this->handler->setHandler($next_handler);

        $this->assertInstanceOf(
            'Design\ChainOfResponsibility\AlphabetValidationHandler',
            $this->handler->getNextHandler()
        );
    }


    /**
     * @test
     * @group cor-number-not-set-number
     * @group cor
     **/
    public function 数字以外を指定した場合 ()
    {
        $input = 'abcd1234';
        $error = $this->handler->validate($input);

        $this->assertEquals('半角数字で入力してください', $error);
    }


    /**
     * @test
     * @group cor-number-set-number
     * @group cor
     **/
    public function 数字を指定した場合 ()
    {
        $input = '1234';
        $result = $this->handler->validate($input);

        $this->assertTrue($result);
    }
}

