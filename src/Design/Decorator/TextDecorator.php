<?php


namespace Design\Decorator;

abstract class TextDecorator implements Text
{

    /**
     * @var Text
     **/
    private $text;


    /**
     * @param  Text $text
     * @return void
     **/
    public function __construct (Text $text)
    {
        $this->text = $text;
    }


    /**
     * @param  string $text
     * @return void
     **/
    public function setText ($text)
    {
        $this->text->setText($text);
    }


    /**
     * @return string
     **/
    public function getText ()
    {
        return $this->text->getText();
    }
}

