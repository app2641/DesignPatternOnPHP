<?php


use Design\Composite\Employee;
use Design\Composite\Group;

class CompositeEmployeeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    使用できないメソッドです
     * @group composite-employee-not-allow-method
     * @group composite
     */
    public function 社員に子供に要素を追加しようとした場合 ()
    {
        $code = '1234';
        $name = 'John';
        $user =  new Employee($code, $name);

        $code2 = 'abcd';
        $name2 = 'Carry';
        $user2 = new Employee($code2, $name2);

        $user->add($user2);
    }


    /**
     * @test
     * @group composite-employee-dump
     * @group composite
     */
    public function ダンプ処理 ()
    {
        $code = '1234';
        $name = 'John';
        $group = new Group($code, $name);

        $code2 = 'abcd';
        $name2 = 'Carry';
        $user = new Employee($code2, $name2);

        $group->add($user);
        $group->dump();

        $result = $code.': '.$name.PHP_EOL.
            $code2.': '.$name2.PHP_EOL;
        $this->expectOutputString($result);
    }
}

