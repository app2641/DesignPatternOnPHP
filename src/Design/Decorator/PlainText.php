<?php


namespace Design\Decorator;

class PlainText implements Text
{

    /**
     * @var string
     **/
    private $text;


    /**
     * @param  string $text
     * @return void
     **/
    public function setText ($text)
    {
        $this->text = $text;
    }


    /**
     * @return string
     **/
    public function getText ()
    {
        if (is_null($this->text)) throw new \Exception('テキストを指定してください');
        return $this->text;
    }
}

