<?php


namespace Design\Adapter;

class ShowFile
{
    
    /**
     * ファイルへのパス
     *
     * @var sring
     **/
    protected $file_path;


    /**
     * @param  string $file_path
     * @return void
     **/
    public function setFilePath ($file_path)
    {
        $this->file_path = $file_path;
    }


    /**
     * ファイルの内容を表示する
     *
     * @return void
     **/
    public function showPlain ()
    {
        $this->_validateFilePath();

        echo '<pre>';
        echo htmlspecialchars(file_get_contents($this->file_path), ENT_QUOTES);
        echo '</pre>';
    }


    /**
     * ファイル内容をハイライト表示する
     *
     * @return void
     **/
    public function showHighlight ()
    {
        $this->_validateFilePath();

        highlight_file($this->file_path);
    }


    /**
     * パラメータのバリデート
     *
     * @return void
     **/
    private function _validateFilePath ()
    {
        if (is_null($this->file_path)) {
            throw new \Exception('ファイル情報を指定してください');
        }

        if (! is_readable($this->file_path)) {
            throw new \Exception('指定ファイルを読み込むことが出来ません');
        }
    }
}

