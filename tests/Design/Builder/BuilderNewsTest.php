<?php


use Design\Builder\News;

class BuilderNewsTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var News
     **/
    private $news;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->news = new News();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    タイトルが不正です
     * @group builder-not-set-news-title
     * @group builder
     */
    public function タイトルを指定していない場合 ()
    {
        $this->news->getTitle();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    URLが不正です
     * @group builder-not-set-news-url
     * @group builder
     */
    public function URLを指定していない場合 ()
    {
        $this->news->getUrl();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    日付が不正です
     * @group builder-not-set-news-date
     * @group builder
     */
    public function 日付を指定していない場合 ()
    {
        $this->news->getTargetDate();
    }


    /**
     * @test
     * @group builder-get-news-title
     * @group builder
     */
    public function タイトルの取得 ()
    {
        $title = 'foo';
        $this->news->setTitle($title);
        $this->assertEquals($title, $this->news->getTitle());
    }


    /**
     * @test
     * @group builder-get-news-url
     * @group builder
     */
    public function URLの取得 ()
    {
        $url = 'https://google.com';
        $this->news->setUrl($url);
        $this->assertEquals($url, $this->news->getUrl());
    }


    /**
     * @test
     * @group builder-get-news-date
     * @group builder
     */
    public function 日付の取得 ()
    {
        $date = date('Y-m-d H:i:s');
        $this->news->setTargetDate($date);
        $this->assertEquals($date, $this->news->getTargetDate());
    }
}

