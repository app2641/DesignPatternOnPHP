<?php


namespace Design\Bridge;

class ExtendedListing extends Listing
{

    /**
     * @var string
     **/
    protected $file_path;


    /**
     * @var FileDataSource
     **/
    protected $source;


    /**
     * @return string
     **/
    public function readWithEncode ()
    {
        return htmlspecialchars($this->read(), ENT_QUOTES);
    }
}

