<?php


namespace Design\Interpreter;

class Context
{

    /**
     * @var array
     **/
    private $commands = array();


    /**
     * @var int
     **/
    private $current_index = 0;


    /**
     * @var int
     **/
    private $max_index = 0;


    /**
     * @param  Command $command
     * @return void
     **/
    public function addCommand (Command $command)
    {
        $this->commands[] = $command;
        $this->max_index  = count($this->commands);
    }


    /**
     * @return Context
     **/
    public function next ()
    {
        $this->current_index++;
        return $this;
    }


    /**
     * @return Command
     **/
    public function getCurrentCommand ()
    {
        if (! array_key_exists($this->current_index, $this->commands)) {
            return null;
        } else {
            return $this->commands[$this->current_index];
        }
    }
}

