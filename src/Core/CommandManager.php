<?php

namespace It\Core;

use It\Lib\PrintLog;

class CommandManager 
{
    private static array $commands = [];

    public static function addCommand(string $command, string $class): void
    {
        if (self::commandExists($command)) {
            PrintLog::error("The command '{$command}' is already registered.");
            exit(1);
        }
    
        if (!is_subclass_of($class, Command::class)) {
            $message = "The class '{$class}' must extend '";
            $message .= Command::class;
            $message .= "' to be registered as a command.";
            
            PrintLog::error($message);
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
