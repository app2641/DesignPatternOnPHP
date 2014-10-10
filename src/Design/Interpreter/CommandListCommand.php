<?php


namespace Design\Interpreter;

class CommandListCommand implements Command
{

    /**
     * @param  Context $context
     * @return boolean
     **/
    public function execute (Context $context)
    {
        while (true) {
            $current = $context->getCurrentCommand();

            if (is_null($current)) {
                throw new \Exception('次のコマンドが指定されていません');
            } elseif ($current === 'end') {
                break;
            } else {
                $command->next_command->execute($context);
            }

            $context->next();
        }
        
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

