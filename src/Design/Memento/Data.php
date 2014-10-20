<?php


namespace Design\Memento;

use Design\Memento\DataSnapshot;

class Data extends DataSnapshot
{

    /**
     * @var array
     **/
    private $comments = array();


    /**
     * @param  string $comment
     * @return void
     **/
    public function addComment ($comment)
    {
        $this->comments[] = $comment;
    }


    /**
     * @return array
     **/
    public function getComments ()
    {
        return $this->comments;
    }


    /**
     * @return void
     **/
    public function takeSnapshot ()
    {
        $snap = new DataSnapshot();
        $snap->setComments($this->comments);

        return $snap;
    }


    /**
     * @param  DataSnapshot $snap
     * @return void
     **/
    public function restoreSnapshot (DataSnapshot $snap)
    {
        $this->comments = $snap->getComments();
    }
}

