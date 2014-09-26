<?php


namespace Design\Bridge;

class FileDataSource implements DataSource
{

    /**
     * @var string
     **/
    private $file_path;


    /**
     * @var FilePointer
     **/
    private $handler;


    /**
     * @param  string $file_path
     * @return void
     **/
    public function setFilePath ($file_path)
    {
        $this->file_path = $file_path;
    }


    /**
     * @return void
     **/
    public function open ()
    {
        if (is_null($this->file_path)) {
            throw new \Exception('ファイルを指定してください');
        }

        if (! is_readable($this->file_path)) {
            throw new \Exception('ファイルが読み込めません');
        }

        $this->handler = fopen($this->file_path, 'r');
    }


    /**
     * @return string
     **/
    public function read ()
    {
        $buffer = array();
        while (! feof($this->handler)) {
            $buffer[] = fgets($this->handler);
        }

        return implode($buffer);
    }


    /**
     * @return void
     **/
    public function close ()
    {
        if (! is_null($this->handler)) {
            fclose($this->handler);
        }
    }
}

