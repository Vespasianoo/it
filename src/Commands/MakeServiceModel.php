<?php

namespace It\Commands;

use Exception;
use It\Core\ArgvInput;
use It\Core\Command;
use It\Core\Stub;
use It\Lib\PrintLog;

class MakeServiceModel extends Command
{
    const DESCRIPTION = 'Generates a REST service class based on an Active Record model for HTTP operations.';

    private string $servicesModelPath = './app/service/rest';
    private string $className;
    private string $path;
    private string $connector;
 
    public function handle(ArgvInput $argvInput): void
    {
        try {
            $this->setClassName($argvInput->getFirstArg());
            $this->setConnector($argvInput->getSecondArg());
            $this->setPath($argvInput->getThirdArg());


            $this->build();

            PrintLog::success('deu certo');
        } catch (Exception $e) {
            PrintLog::error($e->getMessage());
        }
    }

    public function build()
    {
        $template = $this->getStub();

        $array_search = [];
        $array_search[] = '{{model}}';
        $array_search[] = '{{database}}';

        $array_replace = [];
        $array_replace[] = $this->className;
        $array_replace[] = $this->connector;

        $serviceRestContent = str_replace($array_search, $array_replace, $template);

        $this->createFile($serviceRestContent);
    }

    private function setClassName(string $firstArg)
    {
        if (empty($firstArg)) {
            throw new Exception("O nome da class é obrigatorio");
        }

        $this->className = $firstArg . 'RestService';
        return $this->className;
    }

    private function setConnector(string $secondArg)
    {
        if (empty($secondArg)) {
            throw new Exception("O connector é obrigatorio");
        }

        $this->connector = $secondArg;

        return $this->connector;
    }

    private function setPath(?string $thirdArg)
    {
        $this->path = $thirdArg ?? '';
        return $this->path;
    }

    private function createFile($serviceRestContent)
    {
        $path_target = "{$this->servicesModelPath}";
        
        if ($this->path) {
            $path_target .= "/{$this->path}";
        }
        
        if (!is_dir($path_target)) {
            mkdir($path_target, 0777, true);
        }

        $path_target .= "/{$this->className}RestService.php";

        file_put_contents($path_target, $serviceRestContent);
    }

    private function getStub()
    {
        $stub = Stub::get('serviceRest');

        if (!$stub) {
            throw new Exception("Service Rest stub not found.");
        }

        return $stub;
    }
}
