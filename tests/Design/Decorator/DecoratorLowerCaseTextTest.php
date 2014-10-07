<?php


use Design\Decorator\LowerCaseText;
use Design\Decorator\PlainText;

class DecoratorLowerCaseText extends PHPUnit_Framework_TestCase
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
        $lower = new LowerCaseText($plain);
        $lower->getText();
    }


    /**
     * @test
     * @group decorator-get-text
     * @group decorator
     */
    public function テキストの取得 ()
    {
        $plain = new PlainText();
        $lower = new LowerCaseText($plain);

        $lower->setText('FOO');
        $this->assertEquals('foo', $lower->getText());
    }
}

