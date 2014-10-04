<?php


namespace Design\Command;

class CopyCommand implements Command
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
        $file = new File();
        $file->setPath('copy_of_'.$this->file->getPath());
        $file->create();
    }
}

