<?php


use Design\Decorator\UpperCaseText;
use Design\Decorator\PlainText;

class DecoratorUpperCaseTextTest extends PHPUnit_Framework_TestCase
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
        $upper = new UpperCaseText($plain);
        $upper->getText();
    }


    /**
     * @test
     * @group decorator-get-text
     * @group decorator
     */
    public function テキストの取得 ()
    {
        $plain = new PlainText();
        $upper = new UpperCaseText($plain);

        $upper->setText('foo');
        $this->assertEquals('FOO', $upper->getText());
    }
}

