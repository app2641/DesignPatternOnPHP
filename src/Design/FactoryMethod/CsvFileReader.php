<?php


namespace Design\FactoryMethod;

class CsvFileReader implements Reader
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

        $this->handler = fopen($this->file_path, 'r');
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
        while ($data = fgetcsv($this->handler, 1000, ',')) {
            foreach ($data as $key => $val) {
                if ($key == 0) {
                    echo '<dt>'.$val.'</dt>'.PHP_EOL;
                } else {
                    echo '<dd>'.$val.'</dd>'.PHP_EOL;
                }
            }
        }
        echo '</dl>'.PHP_EOL;

        fclose($this->handler);
    }
}

