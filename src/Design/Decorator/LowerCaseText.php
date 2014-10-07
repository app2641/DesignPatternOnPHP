<?php


namespace Design\Decorator;

class LowerCaseText extends TextDecorator
{

    /**
     * @var Text
     **/
    private $text;


    /**
     * テキストを小文字にして返す
     *
     * @return string
     **/
    public function getText ()
    {
        $text = parent::getText();
        return strtolower($text);
    }
}

