<?php


namespace Design\Mediator;

class ChatRoom
{

    /**
     * @var array
     **/
    private $users = array();


    /**
     * @param  User $user
     * @return void
     **/
    public function login (User $user)
    {
        $user->setChatRoom($this);

        if (! array_key_exists($user->getName(), $this->users)) {
            $this->users[$user->getName()] = $user;
            echo sprintf('%sさんが入室しました', $user->getName());
        }
    }


    /**
     * @param  string $from
     * @param  string $to
     * @param  string $message
     * @return void
     **/
    public function sendMessage ($from, $to, $message)
    {
        if (array_key_exists($to, $this->users)) {
            $this->users[$to]->receiveMessage($from, $to, $message);
        } else {
            echo $to.'さんは入室していないようです';
        }
    }
}

