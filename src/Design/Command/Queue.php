<?php


namespace Design\Command;

class Queue
{

    /**
     * @var array
     */
    private $commands;

    /**
     * @var int
     */
    private $current_index = 0;


    /**
     * @param  Command $command
     * @return void
     */
    public function addCommand (Command $command)
    {
        $this->commands[] = $command;
    }


    /**
     * @return void
     */
    public function run ()
    {
        while (! is_null($command = $this->next())) {
            $command->execute();
        }
    }


    /**
     * @return Command
     */
    private function next ()
    {
        if (count($this->commands) == 0 ||
            count($this->commands) <= $this->current_index) {
            return null;
        } else {
           return $this->commands[$this->current_index++];
        }
    }
}

