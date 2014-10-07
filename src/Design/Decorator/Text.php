<?php


namespace Design\Decorator;

interface Text
{

    /**
     * @return string
     **/
    public function getText ();


    /**
     * @param  string $text
     * @return void
     **/
    public function setText ($text);
}

