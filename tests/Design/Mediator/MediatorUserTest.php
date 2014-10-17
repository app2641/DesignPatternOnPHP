<?php


use Design\Mediator\User;

class MediatorUserTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var User
     **/
    private $user;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->user = new User();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    名前を指定してください
     * @group mediator-user-not-set-name
     * @group mediator
     */
    public function 名前が指定されていない ()
    {
        $this->user->getName();
    }


    /**
     * @test
     * @group mediator-user-set-name
     * @group mediator
     */
    public function 名前の指定 ()
    {
        $name = 'John';
        $this->user->setName($name);

        $this->assertEquals($name, $this->user->getName());
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    チャットルームを指定してください
     * @group mediator-user-not-set-chat-room
     * @group mediator
     */
    public function チャットが指定されていない ()
    {
        $this->user->getChatRoom();
    }


    /**
     * @test
     * @group mediator-user-set-chat-room
     * @group mediator
     */
    public function チャットの設定 ()
    {
        $chat = $this->getMock('Design\Mediator\ChatRoom');
        $this->user->setChatRoom($chat);

        $this->assertEquals($chat, $this->user->getChatRoom());
    }


    /**
     * @test
     * @group mediator-user-recieve-messsage
     * @group mediator
     */
    public function メッセージの受信 ()
    {
        $name = 'John';
        $from = 'Michel';
        $msg  = 'Hello, Smith!';

        $this->user->setName($name);
        $this->user->receiveMessage($from, $msg);

        $output = sprintf('Message:%dさんから%dさんへ - %d', $from, $name, $msg);
        $this->expectOutputString($output);
    }
}

