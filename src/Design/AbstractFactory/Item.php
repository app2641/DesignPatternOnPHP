<?php


namespace Design\AbstractFactory;

class Item
{

    /**
     * @var int
     **/
    private $id;


    /**
     * @var string
     **/
    private $name;


    /**
     * @param  int $id
     * @return void
     **/
    public function setId ($id)
    {
        $this->id = $id;
    }


    /**
     * @return int
     **/
    public function getId ()
    {
        if (is_null($this->id)) throw new \Exception('idが不正です');
        return $this->id;
    }


    /**
     * @param  string $name
     * @return void
     **/
    public function setName ($name)
    {
        $this->name = $name;
    }


    /**
     * @return string
     **/
    public function getName ()
    {
        if (is_null($this->name)) throw new \Exception('商品名が不正です');
        return $this->name;
    }
}

