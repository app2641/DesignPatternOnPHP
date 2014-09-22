<?php


namespace Design\FactoryMethod;

class XmlFileReader implements Reader
{

    /**
     * @var string
     **/
    private $file_path;


    /**
     * @var FilePointerResource
     **/
    private $handler;


    /**
     * @param  string
     * @return void
     **/
    public function setFilePath ($file_path)
    {
        $this->file_path = $file_path;
    }


    /**
     * 指定ファイルを読み込む
     *
     * @return void
     **/
    public function read ()
    {
        if (is_null($this->file_path)) {
            throw new \Exception('ファイルを指定してください');
        }

        if (! is_readable($this->file_path)) {
            throw new \Exception('指定ファイルを読み込むことが出来ません');
        }

        $this->handler = simplexml_load_file($this->file_path);
    }


    /**
     * 指定ファイルを表示する
     *
     * @return void
     **/
    public function display ()
    {
        if (is_null($this->handler)) {
            throw new \Exception('ファイルの読み込みがされていません');
        }

        echo '<dl>'.PHP_EOL;
        foreach ($this->handler->artist as $artist) {
            foreach ($artist->music as $music) {
                echo '<dt>'.$artist['name'].'</dt>'.PHP_EOL;
                echo '<dd>'.$music['name'].'</dd>'.PHP_EOL;
            }
        }
        echo '</dl>'.PHP_EOL;
    }
}

