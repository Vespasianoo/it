<?php

namespace It\Core;

use It\Lib\PrintLog;

class CommandManager 
{
    private static array $commands = [];

    public static function addCommand(string $command, string $class): void
    {
        if (self::commandExists($command))
        {
            PrintLog::error('This command already exists');
            exit(1);
        }
    
        self::$commands[$command] = $class;
    }    

    public static function getInstanceClassByCommand($command): Command
    {
        return new self::$commands[$command];
    }

    public static function getCommands(): array
    {
        return self::$commands;
    }

    public static function commandExists(string $command)
    {
        if (isset(self::$commands[$command]))
        {
            return class_exists(self::$commands[$command]);
        }
        
        return false;
    }
}
