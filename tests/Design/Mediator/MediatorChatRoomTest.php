<?php


use Design\Mediator\ChatRoom;

class MediatorChatRoomTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var ChatRoom
     **/
    private $chat;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->chat = new ChatRoom();
    }


    /**
     * @test
     * @group mediator-chat-login
     * @group mediator
     */
    public function チャットのログイン ()
    {
        $user = $this->getMock('Design\Mediator\User', array('setChatRoom', 'getName'));
        $user->expects($this->any())
            ->method('getName')->will($this->returnValue('John'));

        $this->chat->login($user);
        $this->expectOutputString('Johnさんが入室しました');
    }


    /**
     * @test
     * @group mediator-chat-send-message
     * @group mediator
     */
    public function メッセージの送信 ()
    {
        $user = $this->getMock('Design\Mediator\User',
            array('setChatRoom', 'getName', 'receiveMessage')
        );
        $user->expects($this->any())
            ->method('getName')->will($this->returnValue('John'));

        $this->chat->login($user);
        $this->chat->sendMessage('Smith', 'John', 'Hello, Marry!');
        $this->expectOutputString('Johnさんが入室しました');
    }


    /**
     * @test
     * @group mediator-chat-not-login
     * @group mediator
     */
    public function ログインしていない場合 ()
    {
        $this->chat->sendMessage('John', 'Smith', 'Hello, Marry!');
        $this->expectOutputString('Smithさんは入室していないようです');
    }
}

