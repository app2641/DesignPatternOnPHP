<?php


namespace Design\Singleton;

class Singleton
{

    /**
     * @var Singleton
     **/
    private static $instance;


    /**
     * @var string
     **/
    private $unique_id;


    /**
     * @return void
     **/
    public function __clone ()
    {
        throw new \Exception('Singletonクラスはクローンすることが出来ません');
    }

    
    /**
     * インスタンスの初期化を行う
     *
     * @return void
     **/
    public static function getInstance ()
    {
        if (! isset(self::$instance)) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }


    /**
     * ユニークなIDを返す
     *
     * @return string
     **/
    public function getUniqueId ()
    {
        if (! isset($this->unique_id)) {
            $this->unique_id = md5(date('r'), mt_rand());
        }

        return $this->unique_id;
    }
}

