<?php


use Design\Builder\RssNewsBuilder;

class BuilderRssNewsBuilderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var RssNewsBuilder
     **/
    private $builder;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->builder = new RssNewsBuilder();
    }


    /**
     * @test
     * @group builder-parse-data
     * @group builder
     **/
    public function 正常な処理 ()
    {
        $path = ROOT.'/data/Builder/foo.xml';
        $list = $this->builder->parse($path);

        $this->assertTrue(is_array($list));
        $this->assertEquals(2, count($list));
    }
}

