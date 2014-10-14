<?php


namespace Design\Interpreter;

class CommandCommand implements Command
{

    /**
     * @param  Context $context
     * @return boolean
     **/
    public function execute (Context $context)
    {
        $command = $context->getCurrentCommand();
        switch ($command) {
        case 'diskspace':
            $path = './';
            $free_size = disk_free_space($path);
            $max_size  = disk_total_space($path);
            $ratio = $free_size / $max_size * 100;

            echo sprintf(
                'Disk Free : %5.1dMB (%3d%%)',
                $free_size / 1024 / 1024,
                $ratio
            );
            break;

        case 'date':
            echo date('Y-m-d H:i:s');
            break;

        case 'line':
            echo '----------';
            break;

        default:
            throw new \Exception('コマンドが正しくありません');
            break;
        }

        return true;
    }


    /**
     * @param  Command $command
     * @return void
     **/
    public function setNextCommand (Command $command)
    {
    }
}

