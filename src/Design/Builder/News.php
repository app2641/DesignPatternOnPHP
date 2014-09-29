<?php


namespace Design\Builder;

class News
{

    /**
     * @var string
     **/
    private $title;


    /**
     * @var string
     **/
    private $url;


    /**
     * @var string
     **/
    private $target_date;


    /**
     * @param  string $title
     * @return void
     **/
    public function setTitle ($title)
    {
        $this->title = $title;
    }


    /**
     * @return string
     **/
    public function getTitle ()
    {
        if (is_null($this->title)) throw new \Exception('タイトルが不正です');
        return $this->title;
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
     * @param  string $date
     * @return void
     **/
    public function setTargetDate ($date)
    {
        $this->target_date = $date;
    }


    /**
     * @return string
     **/
    public function getTargetDate ()
    {
        if (is_null($this->target_date)) throw new \Exception('日付が不正です');
        return $this->target_date;
    }
}

