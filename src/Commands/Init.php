<?php

namespace It\Commands;

use It\Core\ArgvInput;
use It\Core\Command;
use It\Lib\PrintLog;

class Init extends Command
{
    const DESCRIPTION = 'Initializes the project by creating the "it" file';
 
    public function handle(ArgvInput $argvInput): void
    {
        $currentDir = getcwd();
        $sourcePath = $currentDir . '/vendor/vespasiano/it/bin/it';
        $destinationPath = $currentDir . '/it';

        if (copy($sourcePath, $destinationPath)) {

            if (chmod($destinationPath, 0755)) {
                PrintLog::success('Project initialized! "it" CLI is now available in the project root.');
            } 

            return;
        }

        PrintLog::error('Unable to copy the file. Make sure you are in the root directory of the project.');
    }
}
