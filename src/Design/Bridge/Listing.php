<?php


namespace Design\Bridge;

class Listing
{

    /**
     * @var string
     **/
    protected $file_path;


    /**
     * @var FileDataSource
     **/
    protected $source;


    /**
     * @param  string $file_path
     * @return void
     **/
    public function setFilePath ($file_path)
    {
        $this->file_path;
    }


    /**
     * @param  FileDataSource $source
     * @return void
     **/
    public function setDataSource ($source)
    {
        $this->source = $source;
    }


    /**
     * @return void
     **/
    public function open ()
    {
        $this->_validateSource();
        $this->source->open();
    }


    /**
     * @return string
     **/
    public function read ()
    {
        $this->_validateSource();
        return $this->source->read();
    }


    /**
     * @return void
     **/
    public function close ()
    {
        $this->_validateSource();
        $this->source->close();
    }


    /**
     * @return void
     **/
    private function _validateSource ()
    {
        if (is_null($this->source)) {
            throw new \Exception('ソースクラスが指定されていません');
        }
    }
}

