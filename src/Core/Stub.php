<?php

namespace It\Core;


abstract class Stub
{
    const pathBase = './vendor/vespasiano/it/src/templates'; 

    public static function get($stubName) 
    {
        $path = __DIR__ . '/../templates/';
        $path .= $stubName . '.stub';

        return @file_get_contents($path);    
    }
}
