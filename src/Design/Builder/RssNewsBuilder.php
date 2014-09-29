<?php


namespace Design\Builder;

use Design\Builder\News;

class RssNewsBuilder implements NewsBuilder
{

    /**
     * @param  string $url
     * @return array
     **/
    public function parse ($url)
    {
        $data = simplexml_load_file($url);
        if ($data === false) {
            throw new \Exception('データを読み込めません');
        }

        $list = array();
        foreach ($data->entry as $entry) {
            $news = new News();
            $news->setTitle($entry->title);
            $news->setUrl($entry->url);
            $news->setTargetDate($entry->date);
            $list[] = $news;
        }

        return $list;
    }
}

