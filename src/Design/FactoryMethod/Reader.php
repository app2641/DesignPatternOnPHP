<?php


namespace Design\FactoryMethod;

interface Reader
{

    /**
     * ファイルを読み込む処理
     *
     * @return void
     **/
    public function read ();


    /**
     * ファイル内容を表示する処理
     *
     * @return void
     **/
    public function display ();
}

