<?php


namespace Design\Adapter;

use Design\Adapter\ShowFile,
    Design\Adapter\DisplaySourceFile;

class InheritanceFile extends ShowFile implements DisplaySourceFile
{

    /**
     * @var string
     **/
    protected $file_path;


    /**
     * 指定ファイルの内容をハイライト表示する
     *
     * @return void
     **/
    public function display ()
    {
        $this->showHighlight();
    }
}

