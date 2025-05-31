<?php

namespace It\Commands;

use It\Core\ArgvInput;
use It\Core\Command;
use It\Lib\PrintLog;

class Init extends Command
{
    const DESCRIPTION = 'Initializes the project';
 
    public function handle(ArgvInput $argvInput): void
    {
        $currentDir = getcwd();
        $destinationPath = $currentDir . '/it';

        file_put_contents($destinationPath, $this->getBinStub());

        if (!file_exists('./app/service/commands')) {
            mkdir('./app/service/commands', 0777, true);
        }
        
        $stub = $this->getExampleCommandStub();
        $this->createExampleCommand($stub);

        PrintLog::success('Project initialized successfully!');

        PrintLog::success("Created:");
        PrintLog::white("- CLI file at ./it");
        PrintLog::white("- Commands directory at ./app/service/commands");
        PrintLog::white("- ExampleCommand.php at ./app/service/commands/ExampleCommand.php");

        PrintLog::warning("Next steps:");
        PrintLog::white("1. Edit ExampleCommand.php to create your own commands.");
        PrintLog::white("2. Run `php it help` to see all available commands.");
        PrintLog::white("3. Run `php it make:controller YourController` to create a new controller.");
    }

    private function createExampleCommand($content) 
    {
        file_put_contents('./app/service/commands/ExampleCommand.php', $content);
    }

    private function getExampleCommandStub() 
    {
        return $this->getStub(__DIR__ . '/../templates/exampleCommand.stub');
    }
    
    private function getBinStub() 
    {
        return $this->getStub(__DIR__ . '/../templates/bin.stub');
    }

    private function getStub($path) 
    {
        return file_get_contents($path);
    } 
}
