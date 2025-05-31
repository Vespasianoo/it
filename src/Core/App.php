<?php

namespace It\Core;

use It\Lib\PrintLog;

class App
{
    public function __construct()
    {
        $this->validateEnvironment();
        $this->startApp();
    }

    private function startApp() 
    {
        $this->loadCommands();
    }

    public function handle(ArgvInput $argvInput) 
    {
        Engine::run($argvInput);    
    }

    private function loadCommands() 
    {
        $configPath = __DIR__ . '/../../console.php';
    
        if (file_exists($configPath)) {
            require_once $configPath;
        } else {
            \It\Lib\PrintLog::error('❌ Arquivo de comandos não encontrado em: ' . $configPath);
            exit(1);
        }
    }

    private function validateEnvironment()
    {
        if (!is_dir('lib/adianti') && !class_exists('Adianti\Core\AdiantiCoreApplication')) {
            PrintLog::error('❌ Este comando deve ser executado dentro de um projeto com o Adianti Framework.');
            exit(1);
        }
    }
}
