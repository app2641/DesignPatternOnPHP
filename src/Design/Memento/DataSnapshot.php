<?php


namespace Design\Memento;

class DataSnapshot
{

    /**
     * @var array
     **/
    private $comments = array();


    /**
     * @param  array $comment
     * @return void
     **/
    protected function setComments ($comments)
    {
        $this->comments = $comments;
    }


    /**
     * @return array
     **/
    protected function getComments ()
    {
        return $this->comments;
    }
}

