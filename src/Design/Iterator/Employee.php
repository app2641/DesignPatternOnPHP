<?php


namespace Design\Iterator;

class Employee
{

    /**
     * @var string
     **/
    private $name;


    /**
     * @var int
     **/
    private $age;


    /**
     * @var string
     **/
    private $job;


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
        if (is_null($this->name)) throw new \Exception('社員名が不正です');
        return $this->name;
    }


    /**
     * @param  int $age
     * @return void
     **/
    public function setAge ($age)
    {
        $this->age = $age;
    }


    /**
     * @return void
     **/
    public function getAge ()
    {
        if (is_null($this->age)) throw new \Exception('年齢が不正です');
        return $this->age;
    }


    /**
     * @param  string
     * @return void
     **/
    public function setJob ($job)
    {
        $this->job = $job;
    }


    /**
     * @return string
     **/
    public function getJob ()
    {
        if (is_null($this->job)) throw new \Exception('職務名が不正です');
        return $this->job;
    }
}

