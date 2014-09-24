<?php


namespace Design\Iterator;

use Design\Iterator\Employee;

class Employees implements \IteratorAggregate
{

    /**
     * @var array
     **/
    private $employees;


    /**
     * @return void
     **/
    public function __construct ()
    {
        $this->employees = new \ArrayObject();
    }


    /**
     * @param Employee $employee
     * @return void
     **/
    public function add (Employee $employee)
    {
        $this->employees[] = $employee;
    }


    /**
     * @return  
     **/
    public function getIterator ()
    {
        return $this->employees->getIterator();
    }
}

