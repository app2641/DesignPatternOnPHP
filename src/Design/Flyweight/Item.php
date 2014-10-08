<?php


namespace Design\Flyweight;

class Item
{

    /**
     * @var string
     **/
    private $code;


    /**
     * @var string
     **/
    private $name;


    /**
     * @var int
     **/
    private $price;


    /**
     * @param  string $code
     * @param  string $neme
     * @param  int $price
     * @return void
     **/
    public function __construct ($code, $name, $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }


    /**
     * @return string
     **/
    public function getCode ()
    {
        return $this->code;
    }


    /**
     * @return string
     **/
    public function getName ()
    {
        return $this->name;
    }


    /**
     * @return int
     **/
    public function getPrice ()
    {
        return $this->price;
    }
}

