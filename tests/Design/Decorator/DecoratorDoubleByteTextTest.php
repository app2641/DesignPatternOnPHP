<?php


use Design\Decorator\DoubleByteText;
use Design\Decorator\PlainText;

class DecoratorDoubleByteText extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    テキストを指定してください
     * @group decorator-not-set-text
     * @group decorator
     **/
    public function テキストを指定していない場合 ()
    {
        $plain = new PlainText();
        $double = new DoubleByteText($plain);
        $double->getText();
    }


    /**
     * @test
     * @group decorator-get-text
     * @group decorator
     */
    public function テキストの取得 ()
    {
        $plain = new PlainText();
        $double = new DoubleByteText($plain);

        $double->setText('foo');
        $this->assertEquals('ｆｏｏ', $double->getText());
    }
}

