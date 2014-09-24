<?php


use Design\Iterator\Employee;

class EmployeeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Employee
     **/
    private $employee;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->employee = new Employee();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    社員名が不正です
     * @group iterator-valid-employee-name
     * @group iterator
     **/
    public function 社員名を設定していない場合 ()
    {
        $this->employee->getName();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    年齢が不正です
     * @group iterator-valid-employee-age
     * @group iterator
     */
    public function 年齢を指定していない場合 ()
    {
        $this->employee->getAge();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    職務名が不正です
     * @group iterator-valid-employee-job
     * @group iterator
     */
    public function 職務を指定していない場合 ()
    {
        $this->employee->getJob();
    }


    /**
     * @test
     * @group iterator-employee-setter
     * @group iterator
     **/
    public function セッターのテスト ()
    {
        $name = 'John';
        $age  = 28;
        $job  = 'Engineer';

        $this->employee->setName($name);
        $this->employee->setAge($age);
        $this->employee->setJob($job);

        $this->assertEquals($name, $this->employee->getName());
        $this->assertEquals($age, $this->employee->getAge());
        $this->assertEquals($job, $this->employee->getJob());
    }
}

