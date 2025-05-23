<?php
namespace It\Commands;

use It\Core\ArgvInput;
use It\Core\Command;
use It\Core\CommandManager;

class Help extends Command
{
    const DESCRIPTION = 'Shows help information for all commands.';

    public function handle(ArgvInput $argvInput): void
    {
        $commands = CommandManager::getCommands();

        echo 'it [COMMAND]' . PHP_EOL . PHP_EOL;

        foreach ($commands as $commandName => $class) {
            $description = '';

            if (defined("$class::DESCRIPTION")) {
                $description = constant("$class::DESCRIPTION");
            }

            echo str_pad($commandName, 20) . ' - ' . ($description ?: '') . PHP_EOL;
        }
    }
}
