<?php


namespace Design\Flyweight;

use Design\Flyweight\Item;

class ItemFactory
{

    /**
     * 商品情報
     *
     * @var array
     **/
    private $pool;


    /**
     * @var ItemFactory
     **/
    private static $instance = null;


    /**
     * @param  string $file_path
     * @return void
     **/
    private function __construct ($file_path)
    {
        $this->_buildPool($file_path);
    }


    /**
     * @param  string $file_path
     * @return ItemFactory
     **/
    public static function getInstance ($file_path)
    {
        if (is_null(self::$instance)) {
            self::$instance = new ItemFactory($file_path);
        }

        return self::$instance;
    }


    /**
     * 指定ファイルから商品情報を読み込む
     *
     * @param  string $file_path
     * @return void
     **/
    private function _buildPool ($file_path)
    {
        if (! is_readable($file_path)) {
            throw new \Exception('ファイルが読み込めません');
        }

        $fp = fopen($file_path, 'r');
        while ($data = fgetcsv($fp, 1000, ',')) {
            $item = new Item($data[0], $data[1], $data[2]);
            $this->pool[$data[0]] = $item;
        }
        fclose($fp);
    }


    /**
     * @param  string $code
     * @return Item
     **/
    public function getItem ($code)
    {
        if (array_key_exists($code, $this->pool)) {
            return $this->pool[$code];
        } else {
            return null;
        }
    }
}

