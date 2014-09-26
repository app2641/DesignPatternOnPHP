<?php


namespace Design\Bridge;

interface DataSource
{

    /**
     * @return void
     **/
    public function open ();


    /**
     * @return void
     **/
    public function read ();


    /**
     * @return void
     **/
    public function close ();
}

