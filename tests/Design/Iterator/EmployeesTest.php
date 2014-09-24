<?php


use Design\Iterator\Employees;
use Design\Iterator\Employee;

class EmployeesTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Employees
     **/
    private $employees;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->employees = new Employees();
    }


    /**
     * @test
     * @group iterator-employees-get-iterator
     * @group iterator
     */
    public function イテレータの取得 ()
    {
        $this->assertInstanceOf('ArrayIterator', $this->employees->getIterator());
    }
}

