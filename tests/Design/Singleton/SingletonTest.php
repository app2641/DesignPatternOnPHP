<?php

use Design\Singleton\Singleton;

class SingletonTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * @test
     * @group singleton
     * @group singleton-get-instance
     **/
    public function Singletonクラスをインスタンス化する場合 ()
    {
        $single = Singleton::getInstance();
        $this->assertInstanceOf('Design\Singleton\Singleton', $single);
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    Singletonクラスはクローンすることが出来ません
     * @group singleton
     * @group singleton-clone
     */
    public function インスタンスをクローンしようとした場合 ()
    {
        $single = Singleton::getInstance();
        $clone  = clone $single;
    }


    /**
     * @test
     * @group singleton
     * @group singleton-unique
     */
    public function インスタンスがユニークであることを確認する ()
    {
        $single  = Singleton::getInstance();
        $single2 = Singleton::getInstance();

        $this->assertEquals($single->getUniqueId(), $single2->getUniqueId());
        $this->assertEquals($single, $single2);
    }
}

