<?php


use Design\Decorator\PlainText;

class DecoratorPlainTextTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var PlainText
     **/
    private $text;


    /**
     * @return void
     **/
    public function __construct ()
    {
        $this->text = new PlainText();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    テキストを指定してください
     * @group decorator-not-set-text
     * @group decorator
     */
    public function テキストを指定していない場合 ()
    {
        $this->text->getText();
    }


    /**
     * @test
     * @group decorator-get-text
     * @group decorator
     */
    public function テキストを取得する場合 ()
    {
        $text = 'foo';
        $this->text->setText($text);
        $this->assertEquals($text, $this->text->getText());
    }
}

