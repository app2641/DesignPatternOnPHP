<?php


namespace Design\Builder;

class NewsDirector
{

    /**
     * @var NewsBuilder
     **/
    private $builder;


    /**
     * @var string
     **/
    private $url;


    /**
     * @param  NewsBuilder $builder
     * @return void
     **/
    public function setBuilder (NewsBuilder $builder)
    {
        $this->builder = $builder;
    }


    /**
     * @return NewsBuilder
     **/
    public function getBuilder ()
    {
        if (is_null($this->builder)) throw new \Exception('ビルダークラスを指定してください');
        return $this->builder;
    }


    /**
     * @param  string $url
     * @return void
     **/
    public function setUrl ($url)
    {
        $this->url = $url;
    }


    /**
     * @return string
     **/
    public function getUrl ()
    {
        if (is_null($this->url)) throw new \Exception('URLが不正です');
        return $this->url;
    }


    /**
     * @return array
     **/
    public function getNews ()
    {
        $builder = $this->getBuilder();
        $url     = $this->getUrl();

        $news_list = $builder->parse($url);
        return $news_list;
    }
}

