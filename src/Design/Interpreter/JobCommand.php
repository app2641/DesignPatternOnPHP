<?php


namespace Design\Interpreter;

class JobCommand implements Command
{

    /**
     * @var Command
     **/
    private $next_command;


    /**
     * @param  Context $context
     * @return boolean
     **/
    public function execute (Context $context)
    {
        if ($context->getCurrentCommand() != 'begin') {
            throw new \Exception('構文が正しくありません');
        }

        if (is_null($this->next_command)) {
            throw new \Exception('次のコマンドが指定されていません');
        }

        $this->next_command->execute($context->next());

        return true;
    }


    /**
     * @param  Commnad $command
     * @return void
     **/
    public function setNextCommand (Command $command)
    {
        $this->next_command = $command;
    }
}

