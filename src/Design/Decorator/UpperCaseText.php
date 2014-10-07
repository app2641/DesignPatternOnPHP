<?php


namespace Design\Decorator;

class UpperCaseText extends TextDecorator
{

    /**
     * @var Text
     **/
    private $text;


    /**
     * 半角小文字を半角大文字にして返す
     *
     * @return string
     **/
    public function getText ()
    {
        $text = parent::getText();
        return strtoupper($text);
    }
}

