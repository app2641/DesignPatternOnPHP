<?php


namespace Design\TemplateMethod;

abstract class AbstractDisplay
{

    /**
     * 表示するデータ
     *
     * @var array
     **/
    private $data;


    /**
     * @param  mixed $data
     * @return void
     **/
    public function setData ($data)
    {
        if (! is_array($data)) {
            $data = array($data);
        }

        $this->data = $data;
    }


    /**
     * @return array
     **/
    public function getData ()
    {
        return $this->data;
    }


    /**
     * 格納データの中身を表示する処理
     *
     * @return void
     **/
    public function display ()
    {
        try {
            $this->_validateParameters();

            $this->_displayHeader();
            $this->_displayBody();
            $this->_displayFooter();
        
        } catch (\Exception $e) {
            throw $e;
        }
    }


    /**
     * パラメータをバリデートする
     *
     * @return void
     **/
    private function _validateParameters ()
    {
        if (is_null($this->data)) {
            throw new \Exception('データを指定してください');
        }
    }


    /**
     * ヘッダ部を出力する
     *
     * @return void
     **/
    protected abstract function _displayHeader();


    /**
     * ボディ部を出力する
     *
     * @return void
     **/
    protected abstract function _displayBody();


    /**
     * フッター部を出力する
     *
     * @return void
     **/
    protected abstract function _displayFooter();

}

