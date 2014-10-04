<?php


namespace Design\Command;

class File
{

    /**
     * @var string
     */
    private $path;


    /**
     * @param  string $path
     * @return void
     */
    public function setPath ($path)
    {
        $this->path = $path;
    }


    /**
     * @return string
     */
    public function getPath ()
    {
        if (is_null($this->path)) throw new \Exception('ファイルを指定してください');
        return $this->path;
    }


    /**
     * @return void
     */
    public function decompass ()
    {
        echo $this->getPath().'を展開しました';
    }


    /**
     * @return void
     */
    public function compass ()
    {
        echo $this->getPath().'を圧縮しました';
    }


    /**
     * @return void
     */
    public function create ()
    {
        echo $this->getPath().'を作成しました';
    }
}

