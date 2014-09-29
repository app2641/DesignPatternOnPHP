<?php


use Design\Builder\NewsDirector;
use Design\Builder\RssNewsBuilder;

class BuilderNewsDirectorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var NewsDirector
     **/
    private $director;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->director = new NewsDirector();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    ビルダークラスを指定してください
     * @group builder-not-set-builder
     * @group builder
     */
    public function ビルダーを指定していない場合 ()
    {
        $this->director->getBuilder();
    }


    /**
     * @test
     * @expectedException           Exception
     * @expectedExceptionMessage    URLが不正です
     * @group builder-not-set-url
     * @group builder
     */
    public function URLを指定していない場合 ()
    {
        $this->director->getUrl();
    }


    /**
     * @test
     * @group builder-client-execute
     * @group builder
     **/
    public function 正常な処理 ()
    {
        $path    = ROOT.'/data/Builder/foo.xml';
        $builder = new RssNewsBuilder();

        $this->director->setBuilder($builder);
        $this->director->setUrl($path);
        $list = $this->director->getNews();

        $this->assertTrue(is_array($list));
        $this->assertEquals(2, count($list));
    }
}

