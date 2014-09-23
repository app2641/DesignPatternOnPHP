<?php


namespace Design\Facade;

class Item
{
    
    /**
     * @var int
     */
    private $id;


    /**
     * @var string
     */
    private $name;


    /**
     * @var int
     */
    private $price;


    /**
     * @param  int $id
     * @return void
     */
    public function setId ($id)
    {
        $this->id = $id;
    }


    /**
     * @return int
     */
    public function getId ()
    {
        if (is_null($this->id)) throw new \Exception('idが不正です');
        return $this->id;
    }


    /**
     * @param  string $name
     * @return void
     */
    public function setName ($name)
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getName ()
    {
        if (is_null($this->name)) throw new \Exception('nameが不正です');
        return $this->name;
    }


    /**
     * @param  int $price
     * @return void
     */
    public function setPrice ($price)
    {
        $this->price = $price;
    }


    /**
     * @var int
     */
    public function getPrice ()
    {
        if (is_null($this->price)) throw new \Exception('priceが不正です');
        return $this->price;
    }
}

