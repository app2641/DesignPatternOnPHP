<?php


namespace Design\Interpreter;

interface Command
{

    /**
     * @param  Context $contet
     * @return boolean
     **/
    public function execute (Context $context);


    /**
     * @param  Command $commnad
     * @return void
     **/
    public function setNextCommand (Command $command);
}

