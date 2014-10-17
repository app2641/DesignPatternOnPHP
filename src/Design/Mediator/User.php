<?php


namespace Design\Mediator;

class User
{

    /**
     * @var string
     **/
    private $name;


    /**
     * @var ChatRoom
     **/
    private $chat_room;


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
        if (is_null($this->name)) throw new \Exception('名前を指定してください');
        return $this->name;
    }


    /**
     * @param  ChatRoom $room
     * @return void
     **/
    public function setChatRoom (ChatRoom $room)
    {
        $this->chat_room = $room;
    }


    /**
     * @return ChatRoom
     **/
    public function getChatRoom ()
    {
        if (is_null($this->chat_room)) throw new \Exception('チャットルームを指定してください');
        return $this->chat_room;
    }


    /**
     * @param  string $to
     * @param  string $message
     * @return void
     **/
    public function sendMessage ($to, $message)
    {
        $this->getChatRoom()->sendMessage($to, $message);
    }


    /**
     * @param  string $from
     * @param  string $message
     * @return void
     **/
    public function receiveMessage ($from, $message)
    {
        echo sprintf(
            'Message:%dさんから%dさんへ - %d',
            $from, $this->getName(), $message
        );
    }
}

