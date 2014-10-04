<?php


namespace Design\Command;

class TouchCommand implements Command
{

    /**
     * @var File
     */
    private $file;


    /**
     * @param  File $file 
     * @return void
     */
    public function setFile ($file)
    {
        $this->file = $file;
    }


    /**
     * @return void
     */
    public function execute ()
    {
        if (is_null($this->file)) throw new \Exception('ファイルを指定してください');
        $this->file->create();
    }
}

