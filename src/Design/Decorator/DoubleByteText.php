<?php


namespace Design\Decorator;

class DoubleByteText extends TextDecorator
{

    /**
     * @var Text
     **/
    private $text;


    /**
     * テキストを全角文字にして返す
     *
     * @return string
     **/
    public function getText ()
    {
        $text = parent::getText();
        return mb_convert_kana($text, 'RANSKV');
    }
}

