<?php


use Design\Composite\Group;

class CompositeGroupTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @group composite-group-init
     * @group composite
     */
    public function 初期化処理 ()
    {
        $code = 'abcd';
        $name = 'John';
        $group = new Group($code, $name);

        $this->assertEquals($code, $group->getCode());
        $this->assertEquals($name, $group->getName());
    }


    /**
     * @test
     * @group composite-group-dump
     * @group composite
     */
    public function ダンプ処理 ()
    {
        $code = 'abcd';
        $name = 'John';
        $group = new Group($code, $name);

        $code2 = '1234';
        $name2 = 'Carry';
        $group2 = new Group($code2, $name2);

        $group->add($group2);
        $group->dump();

        $result = $code.': '.$name.PHP_EOL.
            $code2.': '.$name2.PHP_EOL;

        $this->expectOutputString($result);
    }
}

