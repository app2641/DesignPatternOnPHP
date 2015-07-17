<?php


use Design\Observer\PresentListener;

class ObserverPresentListenerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var PresentListener
     **/
    private $listener;


    /**
     * @return void
     **/
    public function setUp ()
    {
        $this->listener = new PresentListener();
    }
}

