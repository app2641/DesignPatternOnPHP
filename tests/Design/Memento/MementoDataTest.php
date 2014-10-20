<?php


use Design\Memento\Data;

class MementoDataTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Data
     **/
    private $data;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->data = new Data();
    }


    /**
     * @test
     * @group memento-get-comments
     * @group memento
     */
    public function コメントの取得 ()
    {
        $comment = 'hoo!';
        $this->data->addComment($comment);
        $comments = $this->data->getComments();

        $this->assertEquals($comment, current($comments));
    }


    /**
     * @test
     * @group memento-take-shanpshot
     * @group memento
     */
    public function スナップショットの生成 ()
    {
        $snap = $this->data->takeSnapshot();
        $this->assertInstanceOf('Design\Memento\DataSnapshot', $snap);
    }


    /**
     * @test
     * @group memento-restore-snapshot
     * @group memento
     */
    public function スナップショットの復元 ()
    {
        $comment = 'foo';
        $this->data->addComment($comment);
        $snap = $this->data->takeSnapshot();

        $this->data->addComment('bar');
        $this->data->restoreSnapshot($snap);

        $comments = $this->data->getComments();
        $this->assertEquals($comment, current($comments));
    }
}

