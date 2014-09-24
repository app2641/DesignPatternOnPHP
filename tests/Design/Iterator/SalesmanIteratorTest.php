<?php


use Design\Iterator\SalesmanIterator;
use Design\Iterator\Employee;
use Design\Iterator\Employees;

class SalesmanIteratorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group iterator-accept-return-false 
     * @group iterator
     **/
    public function イテレータで許可しない値だった場合 ()
    {
        $employee = new Employee();
        $employee->setJob('ENGINEER');

        $employees = new Employees();
        $employees->add($employee);

        $iterator = new SalesmanIterator($employees->getIterator());
        $this->assertFalse($iterator->accept());
    }


    /**
     * @test
     * @group iterator-accept-return-true
     * @group iterator
     **/
    public function イテレータで許可する値だった場合 ()
    {
        $employee = new Employee();
        $employee->setJob('SALESMAN');

        $employees = new Employees();
        $employees->add($employee);

        $iterator = new SalesmanIterator($employees->getIterator());
        $this->assertTrue($iterator->accept());
    }


    /**
     * @test
     * @group iterator-execute
     * @group iterator
     */
    public function 正常な処理 ()
    {
        $employees = new Employees();

        $user1 = new Employee();
        $user1->setName('Smith');
        $user1->setAge(32);
        $user1->setJob('CLEAK');
        $employees->add($user1);

        $user2 = new Employee();
        $user2->setName('Alen');
        $user2->setAge(26);
        $user2->setJob('SALESMAN');
        $employees->add($user2);

        $user3 = new Employee();
        $user3->setName('Martin');
        $user3->setAge(50);
        $user3->setJob('SALESMAN');
        $employees->add($user3);

        $user4 = new Employee();
        $user4->setName('Clark');
        $user4->setAge(45);
        $user4->setJob('MANAGER');
        $employees->add($user4);

        $user5 = new Employee();
        $user5->setName('King');
        $user5->setAge(45);
        $user5->setJob('PRESIDENT');
        $employees->add($user5);

        $iterator  = $employees->getIterator();
        $salesmans = new SalesmanIterator($iterator);

        $list = file_get_contents(ROOT.'/data/Iterator/EmployeeList.html');
        $this->assertEquals($list, $this->_renderList($iterator));

        $list = file_get_contents(ROOT.'/data/Iterator/SalesmanList.html');
        $this->assertEquals($list, $this->_renderList($salesmans));
    }


    /**
     * 渡されたイテレータをリストで返す
     *
     * @param  mixed $iterator
     * @return void
     **/
    private function _renderList ($iterator)
    {
        $text = '<ul>'.PHP_EOL;
        foreach ($iterator as $user) {
            $text .= sprintf('<li>%s (%d, %s)</li>'.PHP_EOL,
                $user->getName(), $user->getAge(), $user->getJob());
        }
        $text .= '</ul>'.PHP_EOL;

        return $text;
    }
}

