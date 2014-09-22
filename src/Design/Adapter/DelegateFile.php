<?php


namespace Design\Adapter;

use Design\Adapter\ShowFile,
    Design\Adapter\DisplaySourceFile;

class DelegateFile implements DisplaySourceFile
{
    
    /**
     * @var ShowFile
     **/
    protected $sf;


    /**
     * @return void
     **/
    public function __construct ()
    {
        $this->sf = new ShowFile();
    }


    /**
     * @param  string
     * @return void
     **/
    public function setFilePath ($file_path)
    {
        $this->sf->setFilePath($file_path);
    }


    /**
     * 指定ファイの内容をハイライト表示する
     *
     * @return void
     **/
    public function display ()
    {
        $this->sf->showHighlight();
    }
}


